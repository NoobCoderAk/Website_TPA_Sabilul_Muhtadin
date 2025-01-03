<!-- Footer -->

<!-- Floating Action Button -->

<section id="footer">
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row logo text-start p-4" style="border-radius: 10px; margin-right:40px; background-color:#D9D9D9;">
                        <div class="col">
                            <div class="row" style="margin-bottom: 20px;">
                                <img src="/Assets/Images/logo_tpq.png" alt="TPA Sabilul Muhtadin Logo">
                            </div>
                            <div class="row">
                                <p>TPA Sabilul Muhtadin</p>
                                <p>Lokasi<br>
                                    Gulon, Salam, Magelang Regency, Central Java 56484</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 footer-links">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url() ?>/kontak">Contact Us</a></li>
                        <li><a href="<?= base_url() ?>/about">Tentang Kami</a></li>
                        <li><a href="<?= base_url() ?>/pertanyaan">FAQ</a></li>
                        <li><a href="<?= base_url() ?>/prestasi">Prestasi</a></li>
                    </ul>
                </div>

                <div class="col-md-4 footer-contact">
                    <h5>Contact us</h5>
                    <p>Anda bisa hubungi kami untuk info yang lebih detail melalui nomor di bawah ini.</p>
                    <p><strong>0857-1242-1259</strong></p>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 Copyright by TPA Sabilul Muhtadin.</p>
            </div>
        </div>
    </footer>
</section>
<!-- End of Footer -->




<!-- Scripts -->

<script>
    function loadArticleDetail(id) {
        // check Log the ID being requested
        console.log("Requesting article ID:", id);

        // AJAX request to fetch article details
        fetch(`artikel/get_artikel/${id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok " + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                // Log the data to check its structure
                console.log("Received data:", data);

                // Update modal content with article details
                const baseImageUrl = '<?= base_url('/Assets/Images/Artikel/') ?>';
                // Format the date
                const inputDate = new Date(data.tanggal_input);
                const options = {
                    weekday: 'long',
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                }; // Format: Day Month Year
                const formattedDate = inputDate.toLocaleDateString('id-ID', options); // id-ID to set in bahasa indo format

                document.getElementById('articleDetailGambar').src = baseImageUrl + data.gambar;
                document.getElementById('articleDetailTitle').innerText = data.judul;
                document.getElementById('articleDetailDesc').innerText = data.deskripsi;
                document.getElementById('articleDetailAuthor').innerText = data.author;
                document.getElementById('articleDetailDate').innerText = formattedDate;
                // document.getElementById('articleDetailContent').innerHTML = `<p>${data.descrip}</p>`;
            })
            .catch(error => {
                console.error('Error fetching article details:', error);
                document.getElementById('articleDetailContent').innerText = 'Error loading article details.';
            });
    }

    function loadPrestasiDetail(id) {
        // check Log the ID being requested
        console.log("Requesting prestasi ID:", id);

        // AJAX request to fetch article details
        fetch(`prestasi/get_prestasi/${id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok " + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                // Log the data to check its structure
                console.log("Received data:", data);

                // Update modal content with article details
                const baseImageUrl = '<?= base_url('/Assets/Images/Prestasi/') ?>';
                // Format the date
                const inputDate = new Date(data.tanggal_input);
                const options = {
                    weekday: 'long',
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                }; // Format: Day Month Year

                const formattedDate = inputDate.toLocaleDateString('id-ID', options); // id-ID to set in bahasa indo format

                // Update modal content with article details
                document.getElementById('prestasiDetailGambar').src = baseImageUrl + data.gambar;
                document.getElementById('prestasiDetailTitle').innerText = data.judul;
                document.getElementById('prestasiDetailDesc').innerText = data.deskripsi;
                document.getElementById('prestasiDetailAuthor').innerText = data.author;
                document.getElementById('prestasiDetailDate').innerText = formattedDate;
                // document.getElementById('articleDetailContent').innerHTML = `<p>${data.descrip}</p>`;
            })
            .catch(error => {
                console.error('Error fetching prestasi details:', error);
                document.getElementById('prestasiDetailContent').innerText = 'Error loading prestasi details.';
            });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>