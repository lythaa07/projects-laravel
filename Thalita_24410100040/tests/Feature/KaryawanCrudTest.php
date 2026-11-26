<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KaryawanCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app['url']->forceRootUrl('http://localhost');
    }

    public function test_karyawan_can_be_created_read_updated_and_deleted(): void
    {
        $data = [
            'kode' => 'K001',
            'nama' => 'Nama Awal',
            'alamat' => 'Alamat awal',
            'telp' => '08123456789',
            'tanggal_lahir' => '1990-01-01',
            'pendidikan' => 'S1',
        ];

        $this->get(route('karyawan.create', [], false))->assertOk();
        $this->post(route('karyawan.store', [], false), $data)
            ->assertRedirect(route('karyawan.index'));
        $this->assertDatabaseHas('karyawan', ['kode' => 'K001', 'nama' => 'Nama Awal']);
        $this->get(route('karyawan.index', [], false))
            ->assertOk()
            ->assertSee('Nama Awal')
            ->assertSee(route('karyawan.destroy', 'K001', false))
            ->assertSee('name="_method" value="DELETE"', false)
            ->assertSee('onsubmit="return confirm(', false);
        $this->get(route('karyawan.edit', 'K001', false))
            ->assertOk()
            ->assertSee(route('karyawan.destroy', 'K001', false))
            ->assertSee('form="karyawan-delete-form"', false)
            ->assertSee('name="_method" value="DELETE"', false)
            ->assertSee('onsubmit="return confirm(', false);

        $this->put(route('karyawan.update', 'K001', false), [
            ...$data,
            'nama' => 'Nama Baru',
        ])->assertRedirect(route('karyawan.index'));
        $this->assertDatabaseHas('karyawan', ['kode' => 'K001', 'nama' => 'Nama Baru']);

        $this->delete(route('karyawan.destroy', 'K001', false))
            ->assertRedirect(route('karyawan.index'));
        $this->assertDatabaseMissing('karyawan', ['kode' => 'K001']);
    }

    public function test_invalid_or_duplicate_karyawan_data_is_rejected(): void
    {
        $data = [
            'kode' => 'K001',
            'nama' => 'Nama Awal',
            'alamat' => 'Alamat awal',
            'telp' => '08123456789',
            'tanggal_lahir' => '1990-01-01',
            'pendidikan' => 'S1',
        ];

        $this->post(route('karyawan.store', [], false), $data)->assertRedirect(route('karyawan.index'));
        $this->from(route('karyawan.create', [], false))
            ->post(route('karyawan.store', [], false), $data)
            ->assertSessionHasErrors('kode');
        $this->from(route('karyawan.create', [], false))
            ->post(route('karyawan.store', [], false), [...$data, 'pendidikan' => 'Tidak valid'])
            ->assertSessionHasErrors('pendidikan');

        $this->assertDatabaseCount('karyawan', 1);
    }

    public function test_missing_karyawan_returns_not_found(): void
    {
        $this->get(route('karyawan.edit', 'missing', false))->assertNotFound();
        $this->put(route('karyawan.update', 'missing', false), [])->assertNotFound();
        $this->delete(route('karyawan.destroy', 'missing', false))->assertNotFound();
    }
}
