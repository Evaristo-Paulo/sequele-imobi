<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function interests (){
        return \DB::select('Select i.name as interested, i.phone, i.email, i.description, u.name as collaborator, a.id as apt_id, i.id from interests i, apartaments a, collaborators c, users u where i.apartament_id = a.id and a.collaborator_id = c.id and u.id = c.user_id and i.status = 1 and a.status = 1 and u.status = 1');
    }

    public function qtdOffer ($id){
        return \DB::select('select u.name, COUNT(c.id) as offer from genders g, interests i, collaborators c, users u, apartaments a where a.id = i.apartament_id and c.id = a.collaborator_id and u.id = c.user_id and g.id = u.gender_id and u.id = ? and i.status = 1 and a.status = 1 group by c.id', [$id]);
    }

    public function interestByCollaborator ($id){
        return \DB::select('Select i.name as interested, i.phone, i.email, i.description, u.name as collaborator, a.id as apt_id, i.id from interests i, apartaments a, collaborators c, users u where i.apartament_id = a.id and a.collaborator_id = c.id and u.id = c.user_id and i.status = 1 and a.status = 1 and u.status = 1 and u.id = ?', [$id]);
    }
}
