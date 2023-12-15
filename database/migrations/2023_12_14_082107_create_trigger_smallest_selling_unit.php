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

        DB::unprepared(
            'CREATE TRIGGER `QTY_UPDATE` AFTER UPDATE ON `transaction_list`
            FOR EACH ROW
            BEGIN
            UPDATE `selling_units` a
    SET
    a.`stock` = a.`stock` - NEW.quantity
    WHERE
    a.`id` = NEW.selling_unit_id;
            END'
        );

        DB::unprepared(
            'CREATE TRIGGER `transactions_after_ins_tr1` AFTER INSERT ON `transactions`
            FOR EACH ROW BEGIN
               IF (NOT NEW.customer_id IS NULL) THEN
               
               UPDATE `customers` a
               SET
               a.`point` = a.`point` + ROUND(NEW.total_price / 100)
               WHERE
               a.id = NEW.customer_id;
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

        DB::unprepared(
            'DROP TRIGGER `QTY_UPDATE`'
        );

        DB::unprepared(
            'DROP TRIGGER `transactions_after_ins_tr1`'
        );
    }
};
