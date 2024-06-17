<!-- Modal trigger button -->
<button
    type="button"
    class="btn btn-danger"
    data-bs-toggle="modal"
    data-bs-target="#modal-{{$photo->id}}"
>
    Delete
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="modal-{{$photo->id}}"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    
    role="dialog"
    aria-labelledby="modalTitle-{{$photo->id}}"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle-{{$photo->id}}">
                    Deleting album
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                You are about to delete forever and ever this album for your database! Are you sure?
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <form action="{{route('album.destroy', $album)}}" method="post">
                @csrf
                @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger"
                    >
                        Confirm
                    </button>
                


                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modal-{{$photo->id}}"),
        options,
    );
</script>
