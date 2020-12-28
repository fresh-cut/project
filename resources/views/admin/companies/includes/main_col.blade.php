<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="car-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#check" aria-controls="check" aria-selected="true" role="tab">Предложенные правки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#new" aria-controls="new" aria-selected="false" role="tab">Новые компании</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="check" role="tabpanel" aria-labelledby="check-tab">
                        @include('admin.companies.includes.noCheck')
                    </div>
                    <div class="tab-pane" id="new" role="tabpanel" aria-labelledby="new-tab">
                        @include('admin.companies.includes.new')
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
