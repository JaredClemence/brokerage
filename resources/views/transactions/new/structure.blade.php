@extends('design.layout')
@section('main')
<div class="form-group">
    <div class='form-group'>
        <label for='transaction.parcel.build_year'>Year Built</label>
        <input class='form-control' id='transaction.parcel.build_year' name='transaction.parcel.build_year' type='number' min='1500' max='2020' step='1' />
    </div>
    <fieldset>
        <legend>SWPI Features: Please check all features that are present on the property.</legend>
        <div class='form-group form-check'>
            <input type="checkbox" class="form-check-input" id="transaction.swpi.septic" name='transaction.swpi.septic'>
            <label class='form-check-label' for='transaction.swpi.septic'>Septic system</label>
        </div>
        <div class='form-group form-check'>
            <input type="checkbox" class="form-check-input" id="transaction.swpi.water_pump" name='transaction.swpi.septic'>
            <label class='form-check-label' for='transaction.swpi.water_pump'>Water pump</label>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary mb-2">Start Uploading Documents</button>
</div>
@endsection