<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Second Modal Title</h4>
            </div>
            <div class="modal-body">
                <!-- Your second modal body content -->
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to handle opening the second modal -->
<script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Find the Hifadhi button
        var hifadhiBtn = document.getElementById("hifadhiBtn");
        // Add a click event listener to it
        hifadhiBtn.addEventListener("click", function() {
            // Find the second modal by its ID and trigger its opening
            $('#myModal2').modal('show');
        });
    });
</script>