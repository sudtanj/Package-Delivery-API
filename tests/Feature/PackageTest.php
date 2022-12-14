<?php

namespace Tests\Feature;

use Tests\TestCase;

class PackageTest extends TestCase
{
    /**
     * Test get all package
     *
     * @return void
     * @throws \Throwable
     */
    public function test_package_all()
    {
        $response = $this->get('/package');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([['transaction_id', 'customer_name', 'customer_code', 'transaction_amount', 'transaction_discount', 'transaction_additional_field', 'transaction_payment_type', 'transaction_state', 'transaction_code', 'transaction_order', 'location_id', 'organization_id', 'created_at', 'updated_at', 'transaction_payment_type_name', 'transaction_cash_amount', 'transaction_cash_change', 'customer_attribute', 'connote', 'connote_id', 'origin_data', 'destination_data', 'koli_data', 'custom_field', 'currentLocation']]);;
    }

    public function test_package_one()
    {
        $response = $this->get('/package/63982b4b1d78000043000952');
        $response
            ->assertStatus(200)
            ->assertJsonStructure(['transaction_id', 'customer_name', 'customer_code', 'transaction_amount', 'transaction_discount', 'transaction_additional_field', 'transaction_payment_type', 'transaction_state', 'transaction_code', 'transaction_order', 'location_id', 'organization_id', 'created_at', 'updated_at', 'transaction_payment_type_name', 'transaction_cash_amount', 'transaction_cash_change', 'customer_attribute', 'connote', 'connote_id', 'origin_data', 'destination_data', 'koli_data', 'custom_field', 'currentLocation']);
    }
}
