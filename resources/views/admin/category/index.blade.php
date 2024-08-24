<x-layout>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Category</h3>
        <!-- Province -->
        <div class="app-content">
            <button
                class="btn btn-success rounded-3 shadow m-3"
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdropAddCate"
                data-bs-whatever="@mdo"
            >
                Add Category
            </button>
            <div class="container-fluid">
                <div class="row">
                    <div class="card mb-2 shadow rounded-4">
                        <h4 class="mt-2 mb-0">Provinces</h4>
                        <div class="card-body rounded-4 pt-0">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session("success") }}
                            </div>
                            @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session("error") }}
                            </div>
                            @endif
                            <table
                                class="table table-striped table-bordered shadow mt-3"
                                id="province"
                            >
                                <thead>
                                    <tr>
                                        <th style="width: 20px !important">
                                            #
                                        </th>
                                        <th>Name</th>
                                        <th>Name in Khmer</th>
                                        <th>Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($province as $row)
                                    <tr class="align-middle">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->kh_name}}</td>
                                        <td>{{$row->code}}</td>
                                        @if($row->status=='0')
                                        <td class="text-success">active</td>
                                        @else
                                        <td class="text-danger">inactive</td>
                                        @endif
                                        <td class="d-flex flex-row gap-2">
                                            <button
                                                class="btn btn-warning rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModalCate-{{ $row->id }}"
                                            >
                                                Edit
                                            </button>
                                            <button
                                                class="btn btn-danger rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModalCate-{{ $row->id }}"
                                            >
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div
                                        class="modal fade"
                                        id="editModalCate-{{ $row->id }}"
                                        tabindex="-1"
                                        aria-labelledby="editModalLabel-{{ $row->id }}"
                                        aria-hidden="true"
                                    >
                                        <div
                                            class="modal-dialog modal-sm modal-top-center"
                                        >
                                            <div class="modal-content">
                                                <form
                                                    action="{{ route('cate.updateProvince', $row->id) }}"
                                                    method="post"
                                                    enctype="multipart/form-data"
                                                >
                                                    @csrf @method('PUT')
                                                    <div class="modal-header">
                                                        <h5
                                                            class="modal-title"
                                                            id="editModalLabel-{{ $row->id }}"
                                                        >
                                                            Edit Information
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        ></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label"
                                                                >Name:</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="name-{{ $row->id }}"
                                                                name="name"
                                                                value="{{ $row->name }}"
                                                            />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label"
                                                                >Khmer
                                                                Name:</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="name-{{ $row->id }}"
                                                                name="kh_name"
                                                                value="{{ $row->kh_name }}"
                                                            />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label
                                                                class="col-form-label"
                                                                >Code:</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                name="code"
                                                                value="{{ $row->code }}"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Cancel
                                                        </button>
                                                        <button
                                                            type="submit"
                                                            class="btn btn-warning"
                                                        >
                                                            Update
                                                        </button>
                                                    </div>
                                                </form>
                                                @if($row->status=='1')
                                                <form
                                                    action="{{
                                                        route(
                                                            'cate.activeProvince', $row->id
                                                        )
                                                    }}"
                                                    method="post"
                                                >
                                                    @csrf @method('PUT')
                                                    <button
                                                        class="btn btn-sm btn-danger rounded-3"
                                                        type="submit"
                                                    >
                                                        This record was
                                                        inactive, Wanna active?
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    <div
                                        class="modal fade"
                                        id="deleteModalCate-{{ $row->id }}"
                                        tabindex="-1"
                                        aria-labelledby="deleteModalLabel-{{ $row->id }}"
                                        aria-hidden="true"
                                    >
                                        <div
                                            class="modal-dialog modal-sm modal-top-center"
                                        >
                                            <div class="modal-content">
                                                <form
                                                    action="{{
                                                        route(
                                                            'cate.removeProvince', $row->id
                                                        )
                                                    }}"
                                                    method="POST"
                                                >
                                                    @csrf @method('PUT')
                                                    <div
                                                        class="modal-header fs-5"
                                                    >
                                                        Are you sure wanna
                                                        remove this record?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Cancel
                                                        </button>
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger"
                                                        >
                                                            Delete Category
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Home Carousel -->
            <div
                class="modal fade"
                id="staticBackdropAddCate"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
                data-bs-target="#staticBackdropAddCate"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
            >
                <div class="modal-dialog modal-sm modal-top-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Add New Provinces
                            </h1>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <form
                                action="{{ route('cate.storeProvince') }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="mb-3">
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >Name:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="recipient-name"
                                        name="name"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >Khmer Name:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="recipient-name"
                                        name="kh_name"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >Code:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="recipient-name"
                                        name="code"
                                        placeholder="province00#"
                                    />
                                </div>
                                <input
                                    type="submit"
                                    name="submit"
                                    value="Add Provinces"
                                    class="btn btn-success"
                                />
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Cancel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logistic Process -->
        <div class="app-content">
            <button
                class="btn btn-success rounded-3 shadow m-3"
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdropAddProcess"
                data-bs-whatever="@mdo"
            >
                Add Logistic Process
            </button>
            <div class="container-fluid">
                <div class="row">
                    <div class="card mb-2 shadow rounded-4">
                        <h4 class="mt-2 mb-0">Logistic Process</h4>
                        <div
                            class="card-body rounded-4"
                            style="height: 300px !important; overflow-y: auto"
                        >
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session("success") }}
                            </div>
                            @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session("error") }}
                            </div>
                            @endif
                            <table
                                class="table table-striped table-bordered shadow"
                            >
                                <thead>
                                    <tr>
                                        <th style="width: 20px !important">
                                            #
                                        </th>
                                        <th>Name</th>
                                        <th>Name in Khmer</th>
                                        <th>Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($process as $row)
                                    <tr class="align-middle">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->kh_name}}</td>
                                        <td>{{$row->code}}</td>
                                        @if($row->status=='0')
                                        <td class="text-success">active</td>
                                        @else
                                        <td class="text-danger">inactive</td>
                                        @endif
                                        <td class="d-flex flex-row gap-2">
                                            <button
                                                class="btn btn-warning rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModalProcess-{{ $row->id }}"
                                            >
                                                Edit
                                            </button>
                                            <button
                                                class="btn btn-danger rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModalProcess-{{ $row->id }}"
                                            >
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div
                                        class="modal fade"
                                        id="editModalProcess-{{ $row->id }}"
                                        tabindex="-1"
                                        aria-labelledby="editModalLabel-{{ $row->id }}"
                                        aria-hidden="true"
                                    >
                                        <div
                                            class="modal-dialog modal-sm modal-top-center"
                                        >
                                            <div class="modal-content">
                                                <form
                                                    action="{{ route('cate.updateProcess', $row->id) }}"
                                                    method="post"
                                                    enctype="multipart/form-data"
                                                >
                                                    @csrf @method('PUT')
                                                    <div class="modal-header">
                                                        <h5
                                                            class="modal-title"
                                                            id="editModalLabel-{{ $row->id }}"
                                                        >
                                                            Edit Information
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        ></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label"
                                                                >Name:</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="name-{{ $row->id }}"
                                                                name="name"
                                                                value="{{ $row->name }}"
                                                            />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label"
                                                                >Khmer
                                                                Name:</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="name-{{ $row->id }}"
                                                                name="kh_name"
                                                                value="{{ $row->kh_name }}"
                                                            />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label
                                                                class="col-form-label"
                                                                >Code:</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                name="code"
                                                                value="{{ $row->code }}"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Cancel
                                                        </button>
                                                        <button
                                                            type="submit"
                                                            class="btn btn-warning"
                                                        >
                                                            Update
                                                        </button>
                                                    </div>
                                                </form>
                                                @if($row->status=='1')
                                                <form
                                                    action="{{route('cate.activeProcess', $row->id)}}"
                                                    method="post"
                                                >
                                                    @csrf @method('PUT')
                                                    <button
                                                        class="btn btn-sm btn-danger rounded-3"
                                                        type="submit"
                                                    >
                                                        This record was
                                                        inactive, Wanna active?
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    <div
                                        class="modal fade"
                                        id="deleteModalProcess-{{ $row->id }}"
                                        tabindex="-1"
                                        aria-labelledby="deleteModalLabel-{{ $row->id }}"
                                        aria-hidden="true"
                                    >
                                        <div
                                            class="modal-dialog modal-sm modal-top-center"
                                        >
                                            <div class="modal-content">
                                                <form
                                                    action="{{
                                                        route(
                                                            'cate.removeProcess', $row->id
                                                        )
                                                    }}"
                                                    method="POST"
                                                >
                                                    @csrf @method('PUT')
                                                    <div
                                                        class="modal-header fs-5"
                                                    >
                                                        Are you sure wanna
                                                        remove this record?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Cancel
                                                        </button>
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger"
                                                        >
                                                            Delete Category
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Home Carousel -->
            <div
                class="modal fade"
                id="staticBackdropAddProcess"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
                data-bs-target="#staticBackdropAddProcess"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
            >
                <div class="modal-dialog modal-sm modal-top-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Add New Logistic Process
                            </h1>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <form
                                action="{{ route('cate.storeProcess') }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="mb-3">
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >Name:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="recipient-name"
                                        name="name"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >Khmer Name:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="recipient-name"
                                        name="kh_name"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >Code:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="recipient-name"
                                        name="code"
                                        placeholder="process00#"
                                    />
                                </div>
                                <input
                                    type="submit"
                                    name="submit"
                                    value="Add Process"
                                    class="btn btn-success"
                                />
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Cancel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item Type -->
        <div class="app-content">
            <button
                class="btn btn-success rounded-3 shadow m-3"
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdropAddItemType"
                data-bs-whatever="@mdo"
            >
                Add Item Type
            </button>
            <div class="container-fluid">
                <div class="row">
                    <div class="card mb-2 shadow rounded-4">
                        <h4 class="mt-2 mb-0">Item Type</h4>
                        <div
                            class="card-body rounded-4"
                            style="height: 300px !important; overflow-y: auto"
                        >
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session("success") }}
                            </div>
                            @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session("error") }}
                            </div>
                            @endif
                            <table
                                class="table table-striped table-bordered shadow"
                                id="myTable"
                            >
                                <thead>
                                    <tr>
                                        <th style="width: 20px !important">
                                            #
                                        </th>
                                        <th>Name</th>
                                        <th>Name in Khmer</th>
                                        <th>Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itemType as $row)
                                    <tr class="align-middle">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->kh_name}}</td>
                                        <td>{{$row->code}}</td>
                                        @if($row->status=='0')
                                        <td class="text-success">active</td>
                                        @else
                                        <td class="text-danger">inactive</td>
                                        @endif
                                        <td class="d-flex flex-row gap-2">
                                            <button
                                                class="btn btn-warning rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModalItemType-{{ $row->id }}"
                                            >
                                                Edit
                                            </button>
                                            <button
                                                class="btn btn-danger rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModalItemType-{{ $row->id }}"
                                            >
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div
                                        class="modal fade"
                                        id="editModalItemType-{{ $row->id }}"
                                        tabindex="-1"
                                        aria-labelledby="editModalLabel-{{ $row->id }}"
                                        aria-hidden="true"
                                    >
                                        <div
                                            class="modal-dialog modal-sm modal-top-center"
                                        >
                                            <div class="modal-content">
                                                <form
                                                    action="{{ route('cate.updateItemType', $row->id) }}"
                                                    method="post"
                                                    enctype="multipart/form-data"
                                                >
                                                    @csrf @method('PUT')
                                                    <div class="modal-header">
                                                        <h5
                                                            class="modal-title"
                                                            id="editModalLabel-{{ $row->id }}"
                                                        >
                                                            Edit Information
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        ></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label"
                                                                >Name:</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="name-{{ $row->id }}"
                                                                name="name"
                                                                value="{{ $row->name }}"
                                                            />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label"
                                                                >Khmer
                                                                Name:</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="name-{{ $row->id }}"
                                                                name="kh_name"
                                                                value="{{ $row->kh_name }}"
                                                            />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label
                                                                class="col-form-label"
                                                                >Code:</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                name="code"
                                                                value="{{ $row->code }}"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Cancel
                                                        </button>
                                                        <button
                                                            type="submit"
                                                            class="btn btn-warning"
                                                        >
                                                            Update
                                                        </button>
                                                    </div>
                                                </form>
                                                @if($row->status=='1')
                                                <form
                                                    action="{{route('cate.activeItemType', $row->id)}}"
                                                    method="post"
                                                >
                                                    @csrf @method('PUT')
                                                    <button
                                                        class="btn btn-sm btn-danger rounded-3"
                                                        type="submit"
                                                    >
                                                        This record was
                                                        inactive, Wanna active?
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    <div
                                        class="modal fade"
                                        id="deleteModalItemType-{{ $row->id }}"
                                        tabindex="-1"
                                        aria-labelledby="deleteModalLabel-{{ $row->id }}"
                                        aria-hidden="true"
                                    >
                                        <div
                                            class="modal-dialog modal-sm modal-top-center"
                                        >
                                            <div class="modal-content">
                                                <form
                                                    action="{{
                                                        route(
                                                            'cate.removeItemType', $row->id
                                                        )
                                                    }}"
                                                    method="POST"
                                                >
                                                    @csrf @method('PUT')
                                                    <div
                                                        class="modal-header fs-5"
                                                    >
                                                        Are you sure wanna
                                                        remove this record?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Cancel
                                                        </button>
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger"
                                                        >
                                                            Delete Category
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Home Carousel -->
            <div
                class="modal fade"
                id="staticBackdropAddItemType"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
                data-bs-target="#staticBackdropAddItemType"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
            >
                <div class="modal-dialog modal-sm modal-top-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Add New Item Type
                            </h1>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <form
                                action="{{ route('cate.storeItemType') }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="mb-3">
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >Name:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="recipient-name"
                                        name="name"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >Khmer Name:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="recipient-name"
                                        name="kh_name"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >Code:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="recipient-name"
                                        name="code"
                                        placeholder="itemType00#"
                                    />
                                </div>
                                <input
                                    type="submit"
                                    name="submit"
                                    value="Add Item Type"
                                    class="btn btn-success"
                                />
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Cancel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
