<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartament extends Model
{

    protected $fillable = [
        'collaborator_id', 'topology_id', 'block_id', 'business_id', 'available_id', 'build', 'price', 'video', 'description', 'flat_id', 'entrance_id', 'condiction_id', 'negociable_id', 'description',
    ];

    public function catalog_apartments()
    {
        return \DB::select('Select a.id as apt_id, u.name as collaborator, a.build, a.price, b.type as business, en.type as entrance, bl.name as block, t.type as topology, n.type as negociable, cond.type as condiction, pa.name as photo, u.photo as photo_colab from condictions cond, topologies t, collaborators c, businesses b, negociables n, users u, apartaments a, blocks bl, entrances en, photo_apartaments pa where a.collaborator_id = c.id and a.status = 1 and pa.apartament_id = a.id and u.id = c.user_id  and u.status = 1 and a.condiction_id = cond.id and a.business_id = b.id and a.negociable_id = n.id and t.id = a.topology_id and bl.id = a.block_id and en.id = a.entrance_id GROUP by a.id');
    }

    public function catalog_apartment_filter($price, $topology, $business)
    {
        return \DB::select('Select a.id as apt_id, u.name as collaborator, a.build, a.price, b.type as business, en.type as entrance, bl.name as block, t.type as topology, n.type as negociable, cond.type as condiction, pa.name as photo, u.photo as photo_colab from condictions cond, topologies t, collaborators c, businesses b, negociables n, users u, apartaments a, blocks bl, entrances en, photo_apartaments pa where a.collaborator_id = c.id and a.status = 1 and pa.apartament_id = a.id and u.id = c.user_id and a.condiction_id = cond.id and u.status = 1 and a.business_id = b.id and a.negociable_id = n.id and t.id = a.topology_id and bl.id = a.block_id and en.id = a.entrance_id and a.price < ? and t.id = ? and b.id = ? GROUP by a.id', [$price, $topology, $business]);
    }

    public function apartment_detail($id)
    {
        return \DB::select('Select a.id as apt_id, u.name as collaborator, a.build, a.price, b.type as business, en.type as entrance, bl.name as block, t.type as topology, n.type as negociable, cond.type as condiction, av.type as available, fl.type as flat, a.description, pa.name as photo, u.photo as photo_colab from condictions cond, topologies t, collaborators c, businesses b, negociables n, users u, apartaments a, availables av, blocks bl, entrances en, photo_apartaments pa, flats fl where a.collaborator_id = c.id and pa.apartament_id = a.id and a.id = ? and u.id = c.user_id and a.condiction_id = cond.id and a.business_id = b.id and a.negociable_id = n.id and t.id = a.topology_id and a.available_id = av.id and bl.id = a.block_id and en.id = a.entrance_id and fl.id = a.flat_id', [$id]);
    }

    public function apartments()
    {
        return \DB::select('Select a.id, u.name, u.email, c.phone, a.build, a.price, b.name as block, e.type as entrance, f.type as flat from flats f, entrances e, blocks b, apartaments a, users u, collaborators c where a.collaborator_id = c.id and c.user_id = u.id and a.status = 1 and u.status = 1 and a.flat_id = f.id and a.block_id = b.id and a.entrance_id = e.id');
    }

    public function apartmentByCollaborator($id)
    {
        return \DB::select('Select a.id, u.name, u.email, c.phone, a.build, a.price, b.name as block, e.type as entrance, f.type as flat from flats f, entrances e, blocks b, apartaments a, users u, collaborators c where a.collaborator_id = c.id and c.user_id = u.id and a.status = 1 and u.status = 1 and a.flat_id = f.id and a.block_id = b.id and a.entrance_id = e.id and u.id = ?', [$id]);
    }
}
