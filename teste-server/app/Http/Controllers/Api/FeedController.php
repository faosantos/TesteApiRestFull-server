<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Log;
use DB;
use App\Lib\Geocode;

class FeedController extends Controller
{
    public function getLocal(Request $req)
    {
      $user = Auth::user();
      $favorites = $user->favorites()->get(['to_id']);

      $feed = DB::select("SELECT 
          u.id as id,
          u.name as name,
          u.avatar as avatar,
          u.about as about,
          IF(u.sex = 'm', 'male', 'female') AS sex,
          TIMESTAMPDIFF(YEAR, u.birth_date, CURDATE()) AS age,
          ROUND(((st_distance(u.location, ST_GeomFromText(?)) * 111195) / 1000), 0) as distance,
          GROUP_CONCAT(img.path) as images
        FROM users AS u
        LEFT JOIN user_images AS img on img.user_id = u.id
        LEFT JOIN blocks AS blk ON (blk.from_user_id = ? AND blk.to_user_id = u.id)
         OR (blk.to_user_id = ? AND blk.from_user_id = u.id)
        WHERE (u.id != ?)
          AND (? = 'b' OR ? = u.sex)
          AND ( u.interest = 'b' OR ? = u.interest)
          AND blk.id is null
        GROUP BY u.id
        HAVING distance <= ?
        ORDER BY distance",
        [
          $user->location->toWkt(),
          $user->id,$user->id,$user->id,
          $user->interest, $user->interest,
          $user->sex,
          500
        ]
      );

      foreach ($feed as $u) {
        // if($u->block == 1 || $u->block == true){
        //   Log::info('BLOCK: ' . $u->block);
        //   $u = null;
        //   break;
        // }
        $u->fav = false;
        foreach($favorites as $fav){
          if($u->id == $fav->to_id){
            $u->fav = true;
          }
        }
        if ($u->images != null) {
          $u->images = explode(',', $u->images);
        } else {
          $u->images = [];
        }
        
      }

      return response()->json($feed, 200);
    }

    public function getSearch(Request $req)
    {
      $user = Auth::user();
      $favorites = $user->favorites()->get(['to_id']);
      $point = Geocode::getPointFromAddress($req->address);
      $search = DB::select(
        "SELECT 
          u.id AS id,
          u.name AS name,
          u.avatar AS avatar,
          u.about AS about,
          IF(u.sex = 'm', 'male', 'female') AS sex,
          TIMESTAMPDIFF(YEAR, u.birth_date, CURDATE()) AS age,
          ROUND(((st_distance(u.location, ST_GeomFromText(?)) * 111195) / 1000), 0) as distance,
          GROUP_CONCAT(img.path) as images
        FROM users AS u
        LEFT JOIN user_images AS img on img.user_id = u.id
        LEFT JOIN blocks AS blk ON (blk.from_user_id = ? AND blk.to_user_id = u.id)
         OR (blk.to_user_id = ? AND blk.from_user_id = u.id)
        WHERE (u.id != ?)
        AND (? = 'b' OR ? = u.sex)
        AND ( u.interest = 'b' OR ? = u.interest)
        AND (blk.id IS NULL)
        GROUP BY u.id
        ORDER BY distance"
      , [
        $point->toWKT(),
        $user->id, $user->id, $user->id,
        $user->interest, $user->interest,
        $user->sex
      ]);
      foreach ($search as $u) {
        $u->fav = false;
        foreach($favorites as $fav){
          if($u->id == $fav->to_id){
            $u->fav = true;
          }
        }
        if ($u->images != null) {
          $u->images = explode(',', $u->images);
        } else {
          $u->images = [];
        }
      }

      return response()->json($search, 200);
    }

    public function getFavorites()
    {
			$user = Auth::user();
      $favs = $user->favorites()->get();
      $faUsers = array();
      foreach($favs as $fav){
        $favorite = $fav->favorite()->first(['id', 'avatar', 'about', 'sex', 'name', 'birth_date', 'location']);
        $images = $favorite->images()->get(['path']);
        $myimages = array();
        foreach($images as $image){
          $myimages[] = $image->path;
        }
        $aditional = DB::select('SELECT
          ROUND(((st_distance(u.location, ST_GeomFromText(?)) * 111195) / 1000), 0) as distance
          FROM users AS u
          WHERE u.id = ?
          GROUP BY u.id
          ORDER BY u.id', 
          [
            $favorite->location->toWkt(),
            $user->id
          ]
        );
        $userData = [
          "id" => $favorite->id,
          "name" => $favorite->name,
          "avatar" => $favorite->avatar,
          "about" => $favorite->about,
          "sex" => $favorite->sex == 'f' ? 'female' : 'male',
          "age" => date_diff(date_create($favorite->birth_date), date_create('today'))->y,
          "distance" => $aditional[0]->distance,
          "images" => $myimages,
          "fav" => true
        ];
        $faUsers[] = $userData;
      }
      
      return response()->json($faUsers, 200);

    }
}
