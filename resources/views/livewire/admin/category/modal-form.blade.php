<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="AddCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
        </div>
        <form wire:submit.prevent="storeCategory">
            <div class="modal-body">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" wire:model.defer="name">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Slug</label>
                    <input type="text" class="form-control" wire:model.defer="slug">
                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal">Close</button>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!--Edit Modal -->
<div wire:ignore.self class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Categorys</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
        </div>
        <div class="p-3">
            <div class="spinner-border text-primary" wire:loading role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div wire:loading.remove>
            <form wire:submit.prevent="updateCategory">
                <div class="modal-body">                    
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" wire:model.defer="name">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" class="form-control" wire:model.defer="slug">
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!--Delete Modal -->
<div wire:ignore.self class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="p-3">
            <div class="spinner-border text-primary" wire:loading role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div wire:loading.remove>
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h4 class="text-danger">Are you sure want to delete this data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes, Delete</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>