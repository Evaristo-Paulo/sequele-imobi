<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $fillable = [
        'bi', 'phone', 'description', 'user_id', 'adress_id'. 'birthday',
    ];
    
    /* Get all collaborators */
    public function collaborators (){
        return \DB::select('select u.id, u.name, g.type as gender, u.email, c.bi, c.phone from  collaborators c, users u, genders g where u.id = c.user_id and g.id = u.gender_id and u.status = 1');
    }

    /* get a collaborator*/
    public function collaborator ($id){
        return \DB::select('Select u.id, u.name, u.email, g.type as gender, u.photo, m.name as municipe, p.name as province, a.street, a.neighbourhood, c.phone, c.birthday, c.bi, c.description from collaborators c, adresses a, users u, genders as g, municipes m, provinces p where c.adress_id = a.id and c.user_id = u.id and g.id = u.gender_id and a.municipe_id = m.id and m.province_id = p.id and u.id = ?', [$id]);
    }

    public function getQtdApartmentCollaborator ($id){
        return \DB::select('select u.name, u.email, g.type gender, c.phone,  COUNT(c.id) as qtd_apartment from genders g, collaborators c, users u, apartaments a where c.id = a.collaborator_id and u.id = c.user_id and g.id = u.gender_id and u.status = 1 and u.id = ? group by c.id', [$id]);
    }
}
