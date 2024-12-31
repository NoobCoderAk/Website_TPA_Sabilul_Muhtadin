<div>
    <?= $artikel['id'] ?>
    <?= $artikel['judul'] ?>
    <?= $artikel['descrip'] ?>
</div>

<div class="modal fade" id="modalArtikel" tabindex="-1" aria-labelledby="modalArtikelLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalArtikelLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <?= $artikel['id'] ?>
                    <?= $artikel['judul'] ?>
                    <?= $artikel['descrip'] ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>