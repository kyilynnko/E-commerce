<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class SubCategory extends Model
{
    public function genPaginate($limit)
    {
        $table = $this->getTable();
        $subcategories = [];
        $sub_cats = Capsule::select("SELECT * FROM $table ORDER BY id  DESC" . $limit);
        foreach($sub_cats as $cat){
            $date = new Carbon($cat->created_at);
            array_push($subcategories,[
                "id" => $cat->id,
                "name" => $cat->name,
                "cat_id" => $cat->cat_id,
                "created_at" => $date->toFormattedDateString()
            ]);
        }
        return $subcategories;
    }
}

?>
