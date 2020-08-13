<div class='list-group-item'>
    {{$transaction->parcel->street}}<br/>
    {{$transaction->owner->name}}<br/>
    {{$transaction->current_close_date->format('m/d/Y')}}<br/>
    {{$transaction->status}}
</div>
