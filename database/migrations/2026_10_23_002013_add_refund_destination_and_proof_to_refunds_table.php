
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('refunds', function (Blueprint $table) {
            $table->string('refund_method', 30)
                ->nullable()
                ->after('reason');

            $table->string('account_name', 150)
                ->nullable()
                ->after('refund_method');

            $table->string('bank_name', 100)
                ->nullable()
                ->after('account_name');

            $table->string('account_number', 100)
                ->nullable()
                ->after('bank_name');

            $table->string('transfer_proof_path')
                ->nullable()
                ->after('account_number');

            $table->string('transfer_reference', 150)
                ->nullable()
                ->after('transfer_proof_path');
        });
    }

    public function down(): void
    {
        Schema::table('refunds', function (Blueprint $table) {
            $table->dropColumn([
                'refund_method',
                'account_name',
                'bank_name',
                'account_number',
                'transfer_proof_path',
                'transfer_reference',
            ]);
        });
    }
};
