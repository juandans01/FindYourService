@extends('layouts.app') @section('content')
<div class="container-fluid">
    <div id="menu-div">

        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#new-service" id="new-btn">New Service</button>



    </div>
    <div id="data-div">
        <table class="table" id="data-table">
            <thead id="table-head">
                <tr>
                    <th id="id-thead"></th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Zip Code</th>
                    <th>City</th>
                    <th>Lat</th>
                    <th>Long</th>
                    <th id=options></th>
                </tr>
            </thead>
            <tbody id="table-body">
            </tbody>
        </table>
    </div>
</div>
<div id="new-service" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Service</h4>
            </div>
            <div class="modal-body" id="modal-body">
                <p>Title</p>
                <input type="text" class="form-control" id="input-title">
                <p>Description</p>
                <textarea class="form-control" rows="5" id="input-desc"></textarea>
                <p>Address</p>
                <input type="text" class="form-control" id="input-address">
                <p>City</p>
                <input type="text" class="form-control" id="input-city">
                <p>Zip Code</p>
                <input type="text" class="form-control" id="input-zip">
                <p>Latitude</p>
                <input type="text" class="form-control" id="input-lat">
                <p>Longitude</p>
                <input type="text" class="form-control" id="input-long">
                <div class="modal-footer">
                    <div class="alert alert-danger fade in" id="new-error-msg">
                        <strong>Error!</strong> All fields are required and well formated
                    </div>
                    <button type="button" class="btn btn-default" id="submit-service">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="cancel-submit">Cancel</button>
                </div>
            </div>

        </div>
    </div>

</div>


<div id="update-service" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Service</h4>
            </div>
            <div class="modal-body" id="upd-modal-body">
                <p>Id</p>
                <p id="upd-id"></p>
                <p>Title</p>
                <input type="text" class="form-control" id="upd-input-title">
                <p>Description</p>
                <textarea class="form-control" rows="5" id="upd-input-desc"></textarea>
                <p>Address</p>
                <input type="text" class="form-control" id="upd-input-address">
                <p>City</p>
                <input type="text" class="form-control" id="upd-input-city">
                <p>Zip Code</p>
                <input type="text" class="form-control" id="upd-input-zip">
                <p>Latitude</p>
                <input type="text" class="form-control" id="upd-input-lat">
                <p>Longitude</p>
                <input type="text" class="form-control" id="upd-input-long">
            </div>
            <div class="modal-footer">
                <div class="alert alert-danger fade in" id="upd-error-msg">
                    <strong>Error!</strong> All fields are required and well formated
                </div>
                <button type="button" class="btn btn-default" id="upd-submit-service">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="cancel-update">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-delete" role="dialog" aria-labelledby="confirm-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="confirm-label">Confirm delete</h4>
            </div>

            <div class="modal-body">
                <p>ID</p>
                <p id="id-label"></p>
                <p>You are about to delete one service, this procedure is irreversible.</p>
                <p>Do you want to proceed?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok" id="confirm-delete-btn">Delete</a>
            </div>
        </div>
    </div>
</div>


@endsection
