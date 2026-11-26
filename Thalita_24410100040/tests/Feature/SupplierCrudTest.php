<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupplierCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app['url']->forceRootUrl('http://localhost');
    }

    public function test_supplier_can_be_created_read_updated_and_deleted(): void
    {
        $data = [
            'kode' => 'S001',
            'nama' => 'Supplier Awal',
            'alamat' => 'Alamat supplier',
            'telp' => '08123456789',
            'perusahaan' => 'Perusahaan Awal',
            'keterangan' => 'Catatan awal',
        ];

        $this->get(route('supplier.create', [], false))->assertOk();
        $this->post(route('supplier.store', [], false), $data)
            ->assertRedirect(route('supplier.index'));
        $this->assertDatabaseHas('supplier', ['kode' => 'S001', 'nama' => 'Supplier Awal']);
        $this->get(route('supplier.index', [], false))
            ->assertOk()
            ->assertSee('Supplier Awal')
            ->assertSee(route('supplier.destroy', 'S001', false))
            ->assertSee('name="_method" value="DELETE"', false)
            ->assertSee('onsubmit="return confirm(', false);
        $this->get(route('supplier.edit', 'S001', false))
            ->assertOk()
            ->assertSee(route('supplier.destroy', 'S001', false))
            ->assertSee('form="supplier-delete-form"', false)
            ->assertSee('name="_method" value="DELETE"', false)
            ->assertSee('onsubmit="return confirm(', false);

        $this->put(route('supplier.update', 'S001', false), [
            ...$data,
            'nama' => 'Supplier Baru',
            'keterangan' => '',
        ])->assertRedirect(route('supplier.index'));
        $this->assertDatabaseHas('supplier', [
            'kode' => 'S001',
            'nama' => 'Supplier Baru',
            'keterangan' => null,
        ]);

        $this->delete(route('supplier.destroy', 'S001', false))
            ->assertRedirect(route('supplier.index'));
        $this->assertDatabaseMissing('supplier', ['kode' => 'S001']);
    }

    public function test_supplier_validation_rejects_duplicate_codes(): void
    {
        $data = [
            'kode' => 'S001',
            'nama' => 'Supplier Awal',
            'alamat' => 'Alamat supplier',
            'telp' => '08123456789',
            'perusahaan' => 'Perusahaan Awal',
            'keterangan' => 'Catatan awal',
        ];

        $this->post(route('supplier.store', [], false), $data)->assertRedirect(route('supplier.index'));
        $this->from(route('supplier.create', [], false))
            ->post(route('supplier.store', [], false), $data)
            ->assertSessionHasErrors('kode');

        $this->assertDatabaseCount('supplier', 1);
    }

    public function test_missing_supplier_returns_not_found(): void
    {
        $this->get(route('supplier.edit', 'missing', false))->assertNotFound();
        $this->put(route('supplier.update', 'missing', false), [])->assertNotFound();
        $this->delete(route('supplier.destroy', 'missing', false))->assertNotFound();
    }
}
