@extends('design.layout')
@section('main')
<form>
    <div class="form-group">
        <label for="parcel.address">Property Address</label>
        <input type="text" class="form-control" id="parcel.address" name="parcel.address">
    </div>
    <div class="form-group">
        <label for="transaction.type">Type</label>
        <select class="form-control" id="transaction.type" name="transaction.type">
            <option value="Residential">Residential</option>
            <option value="Commercial">Commercial</option>
            <option value="Residential Investment">Residential Investment</option>
            <option value="Land">Land</option>
        </select>
    </div>
    <div class="form-group">
        <label class="form-check-label" for="transaction.value">Sale Price</label>
        <div class='input-group'>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">$</span>
            </div>
            <input type="number" class="form-control" id="transaction.value" name="transaction.value" step="1" min="0">
        </div>
    </div>
    <div class='form-group'>
        <label for='transaction.owner'>Lead Agent</label>
        <input type='text' name='transaction.owner' id='transaction.owner' class='form-control' />
        <small>* This is the agent who would take the file with them if they left the brokerage.</small>
    </div>

    <button type="submit" class="btn btn-primary mb-2">Create New Transaction</button>
</form>
@endsection
