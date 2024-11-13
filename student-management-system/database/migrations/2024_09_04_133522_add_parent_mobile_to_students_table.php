<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentMobileToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Check if the 'parent_mobile' column does not already exist
            if (!Schema::hasColumn('students', 'parent_mobile')) {
                $table->string('parent_mobile', 15)->nullable()->after('parent');
            }
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Check if the 'parent_mobile' column exists before dropping
            if (Schema::hasColumn('students', 'parent_mobile')) {
                $table->dropColumn('parent_mobile');
            }
        });
    }
}
