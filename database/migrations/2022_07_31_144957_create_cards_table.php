<?php

use App\Models\User;
use App\Models\CardKind;
use App\Models\CardType;
use App\Models\CardGroup;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('cc_num');            
            
            // foreign keys
            $table->foreignIdFor(CardKind::class);
            $table->foreignIdFor(CardType::class);
            $table->foreignIdFor(CardGroup::class);

            $table->foreignIdFor(User::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
