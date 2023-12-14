<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared(
            'CREATE TRIGGER `selling_units_after_ins_tr2` AFTER INSERT ON `selling_units`
            FOR EACH ROW
          BEGIN
              IF (NEW.is_smallest = TRUE) THEN
              UPDATE `products` a
              INNER JOIN `selling_units` b ON (a.`id` = b.`product_id`)
              INNER JOIN `units` c ON (b.`unit_id` = c.id)
              SET
              a.smallest_selling_unit = c.`name`
              WHERE 
              b.`id` = NEW.id;
              
              END IF;
          END;'
        );

        DB::unprepared(
            'CREATE TRIGGER `after_update` AFTER UPDATE ON `selling_units`
            FOR EACH ROW
            BEGIN
	IF (NEW.is_smallest = TRUE  AND OLD.unit_id <> NEW.unit_id) THEN
    UPDATE `products` a
    INNER JOIN `selling_units` b ON (a.`id` = b.`product_id`)
    INNER JOIN `units` c ON (b.`unit_id` = c.id)
    SET
    a.smallest_selling_unit = c.`name`
    WHERE 
    b.`id` = NEW.id;
    
    END IF;
    
END
            '
        );

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('
            DROP TRIGGER `selling_units_after_ins_tr2`
        ');

        DB::unprepared('
        DROP TRIGGER `AFTER UPDATE`
        ');
    }
};
