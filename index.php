<?php include 'layouts/header.php' ?>

<div class="row pb-5 mb-3 justify-content-center">
    <div class="col-md-4">
        <form action="pdf.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="certificate" class="form-label">Upload certificate</label>
                <input type="file" name="certificate" id="certificate" accept="image/*" onchange="loadImage(event)"><br>
            </div>
            <div class="options" id="options">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="fsize" class="form-label">Font size</label>
                        <input type="number" name="fsize" id="fsize" class="form-control" oninput="editCanvas()">
                    </div>
                    <div class="col-sm-6">
                        <label for="y" class="form-label">Coordinate Y</label>
                        <input type="number" name="y" id="y" class="form-control" oninput="editCanvas()">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="names" class="form-label">List of names</label>
                    <textarea name="names" id="names" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">🚀 Generate!!</button>&nbsp;
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8 mb-3 preview" id="preview">
        <label class="mb-2">Preview certificate : </label>
        <img src="" class="img-fluid" id="img-preview" crossorigin="anonymous">
        <canvas id="canvas" width="100%"></canvas>
    </div>
</div>

<?php include 'layouts/footer.php' ?>