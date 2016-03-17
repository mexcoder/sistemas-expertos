<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Model\Precedent as P;

class Precedents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('precedents', function ($table) {
            $table->boolean('positive');
        });

        $items = P::all();

        foreach ($items as $item) {
            if($item->atom_id < 0){

                $item->positive = false;
                $item->atom_id = abs($item->atom_id);
                $item->save();

            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
