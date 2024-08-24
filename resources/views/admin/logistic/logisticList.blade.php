<x-layout>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Category</h3>
        <!-- Province -->
        <div class="app-content">
            <button
                class="btn btn-success rounded-3 shadow m-3"
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdropAdd"
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
                                id="logistic"
                            >
                                <thead>
                                    <tr>
                                        <th style="width: 20px !important">
                                            #
                                        </th>
                                        <th>Photo</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Item Price</th>
                                        <th>Type</th>
                                        <th>Payment</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Process</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logistics as $row)
                                    <tr class="align-middle">
                                        <td>
                                            @if($row->photo)
                                            <img
                                                src="{{asset('logisticItem/'.$row->photo)}}"
                                                alt=""
                                            />
                                            @else
                                            <img
                                                src="{{
                                                    asset('image/noimg.png')
                                                }}"
                                                alt=""
                                            />
                                            @endif
                                        </td>
                                        <td>{{$row->photo}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->item_price}}</td>
                                        <td>{{$row->item_type}}</td>
                                        <td>{{$row->payment_method}}</td>
                                        <td>{{$row->from_location}}</td>
                                        <td>{{$row->to_destination}}</td>
                                        <td>{{$row->process}}</td>
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
                                                <form action="" method="post">
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
            <!-- Add -->
            <div
                class="modal fade"
                id="staticBackdropAdd"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
                data-bs-target="#staticBackdropAdd"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
            >
                <div class="modal-dialog modal-top-center modal-lg">
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
                                action="{{ route('logistic.storeLogistic') }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="mb-3 d-flex flex-row gap-3">
                                    <div class="w-100">
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
                                            placeholder="#item"
                                        />
                                    </div>
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Price:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="recipient-name"
                                            name="price"
                                            placeholder="$"
                                        />
                                    </div>
                                </div>
                                <div class="mb-3 d-flex flex-row gap-3">
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Item Price:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="recipient-name"
                                            name="item_price"
                                            placeholder="$"
                                        />
                                    </div>
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Item Type:</label
                                        >
                                        <select
                                            name="item_type"
                                            id=""
                                            class="form-select"
                                        >
                                            @foreach($itemTypes as $itemType)
                                            <option value="{{$itemType->id}}">
                                                {{$itemType->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex flex-row gap-3">
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Payment Method:</label
                                        >
                                        <select
                                            name="payment_method"
                                            id=""
                                            class="form-select"
                                        >
                                            <option value="location">
                                                Pay from This
                                            </option>
                                            <option value="destination">
                                                Pay at Destination
                                            </option>
                                        </select>
                                    </div>
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Description:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="recipient-name"
                                            name="description"
                                            placeholder="#optional"
                                        />
                                    </div>
                                </div>
                                <div class="mb-3 d-flex flex-row gap-3">
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >From Location:</label
                                        >
                                        <select
                                            name="from_location"
                                            id=""
                                            class="form-select"
                                        >
                                            @foreach($provinces as $province)
                                            <option value="{{$province->id}}">
                                                {{$province->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >To Destination:</label
                                        >
                                        <select
                                            name="to_destination"
                                            id=""
                                            class="form-select"
                                        >
                                            @foreach($provinces as $province)
                                            <option value="{{$province->id}}">
                                                {{$province->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex flex-row gap-3">
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Process:</label
                                        >
                                        <select
                                            name="process"
                                            id=""
                                            class="form-select"
                                        >
                                            @foreach($processes as $process)
                                            <option value="{{$process->id}}">
                                                {{$process->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Photo:</label
                                        >
                                        <input
                                            type="file"
                                            name="photo"
                                            class="form-control"
                                            id="imgInput"
                                            accept="image/*"
                                        />
                                    </div>
                                </div>
                                <input
                                    type="submit"
                                    name="submit"
                                    value="Add Logistic Item"
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
