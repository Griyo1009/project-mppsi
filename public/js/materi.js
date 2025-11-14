document.addEventListener("DOMContentLoaded", () => {
    const formMateri = document.getElementById("formMateri");
    const listMateri = document.getElementById("listMateri");

    // ===== CREATE MATERI =====
    formMateri?.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(formMateri);

    Swal.fire({
        title: "Menambahkan...",
        text: "Materi sedang diupload...",
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading(),
    });
    const token = document.querySelector('meta[name="csrf-token"]').content;
    try {
        const response = await fetch(`/admin/materi/store`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                "Accept": "application/json",
            },
            body: formData,
        });
        console.log(response)
        const text = await response.text(); // baca body sekali
        let result;

        try {
            result = JSON.parse(text); // coba parse JSON
        } catch {
            console.error("Response bukan JSON:", text);
            throw new Error("Server merespons bukan JSON. Cek console.");
        }
        console.log(result)
        if (response.ok && result.success) {
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: result.message || "Materi berhasil ditambahkan.",
            });

            // Tambahkan materi baru ke tampilan tanpa reload
            appendMateri(result.data);
            formMateri.reset();
            formMateri.classList.add("d-none");
            document.getElementById("toggleFormBtn").innerHTML =
                'Tambah <i class="bi bi-plus-circle ms-2"></i>';
        } else {
            Swal.fire("Gagal", result.message || "Terjadi kesalahan", "error");
        }
    } catch (error) {
        console.error(error);
        Swal.fire("Error", error.message || "Tidak dapat mengupload materi.", "error");
    }
});


    // ===== HAPUS MATERI =====
    listMateri?.addEventListener("click", async (e) => {
        if (e.target.classList.contains("btn-delete")) {
            const id = e.target.dataset.id;

            const konfirmasi = await Swal.fire({
                title: "Yakin hapus?",
                text: "Data materi akan dihapus permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Batal",
            });

            if (!konfirmasi.isConfirmed) return;

            try {
                const response = await fetch(`/admin/materi/${id}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                        "Accept": "application/json",
                    },
                });

                const result = await response.json();

                if (result.success) {
                    Swal.fire("Berhasil!", result.message || "Materi dihapus.", "success");
                    document.querySelector(`.btn-delete[data-id="${id}"]`).closest(".materi-card").remove();
                } else {
                    Swal.fire("Gagal", result.message || "Gagal menghapus.", "error");
                }
            } catch (error) {
                console.error(error);
                Swal.fire("Error", "Tidak dapat menghapus materi.", "error");
            }
        }
    });

    // ===== EDIT MATERI ===== (nanti step berikut)
    listMateri?.addEventListener("click", async (e) => {
        if (e.target.classList.contains("btn-edit")) {
            const id = e.target.dataset.id;

            try {
                const res = await fetch(`/admin/materi/show/${id}`);
                const data = await res.json();

                if (res.ok && data.success) {
                    // Isi data ke form modal
                    document.getElementById("edit_id_materi").value = data.data.id_materi;
                    document.getElementById("edit_judul").value = data.data.judul_materi;
                    document.getElementById("edit_deskripsi").value = data.data.deskripsi ?? "";
                    document.getElementById("edit_link_url").value = data.data.link_url ?? "";

                    const fileContainer = document.getElementById("existingFiles");
                    fileContainer.innerHTML = "";

                    if (data.data.files && data.data.files.length > 0) {
                        data.data.files.forEach(file => {
                            const div = document.createElement("div");
                            div.classList.add("d-flex", "justify-content-between", "align-items-center", "mb-1");
                            div.innerHTML = `
                                <a href="${file.tipe_file === 'link' ? file.link_url : `/storage/${file.file_path}`}" target="_blank">
                                    ${file.tipe_file === 'link' 
                                        ? (file.link_url || 'Lihat Link') 
                                        : (file.file_path ? file.file_path.split('/').pop() : 'File Tidak Ditemukan')
                                    }
                                </a>
                                <button class="btn btn-sm btn-outline-danger btn-remove-file" data-id="${file.id_file}">
                                    <i class="bi bi-x"></i>
                                </button>
                            `;
                            fileContainer.appendChild(div);
                        });
                    } else {
                        fileContainer.innerHTML = `<em>Belum ada file.</em>`;
                    }

                    new bootstrap.Modal(document.getElementById("editMateriModal")).show();
                }
            } catch (error) {
                console.error(error);
                Swal.fire("Error", "Gagal mengambil data materi.", "error");
            }
        }
    });

    // ===== Update Materi =====
    document.getElementById("formEditMateri")?.addEventListener("submit", async (e) => {
        e.preventDefault();
        const id = document.getElementById("edit_id_materi").value;
        const formData = new FormData(e.target);
        formData.append("_method", "PUT");

        Swal.fire({
            title: "Menyimpan...",
            text: "Sedang memperbarui materi...",
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading(),
        });

        try {
            const res = await fetch(`/admin/materi/${id}`, {
                method: "POST",
                headers: { "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value },
                body: formData,
            });

            const data = await res.json();

            if (data.success) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: "Materi berhasil diperbarui.",
                    timer: 1500,
                    showConfirmButton: false,
                });

                bootstrap.Modal.getInstance(document.getElementById("editMateriModal")).hide();
                // Optionally: perbarui tampilan listMateri di halaman tanpa reload
            } else {
                Swal.fire("Gagal", data.message || "Gagal menyimpan perubahan.", "error");
            }
        } catch (error) {
            console.error(error);
            Swal.fire("Error", "Terjadi kesalahan server.", "error");
        }
    });

    // ===== HAPUS FILE TERKAIT MATERI =====
    document.getElementById("existingFiles")?.addEventListener("click", async (e) => {
        if (e.target.closest(".btn-remove-file")) {
            const btn = e.target.closest(".btn-remove-file");
            const idFile = btn.dataset.id;

            const confirm = await Swal.fire({
                title: "Hapus file ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Batal",
            });

            if (!confirm.isConfirmed) return;

            try {
                const res = await fetch(`/admin/materi/file/${idFile}`, {
                    method: "DELETE",
                    headers: { "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value },
                });

                const result = await res.json();

                if (result.success) {
                    btn.parentElement.remove();
                    Swal.fire("Berhasil", "File dihapus.", "success");
                } else {
                    Swal.fire("Gagal", result.message || "Tidak dapat menghapus file.", "error");
                }
            } catch (err) {
                console.error(err);
                Swal.fire("Error", "Gagal menghapus file.", "error");
            }
        }
    });

    // ===== Append Materi Baru ke DOM =====
    function appendMateri(materi) {
        const card = document.createElement("div");
        card.classList.add("materi-card", "mb-4");
        card.innerHTML = `
          <div class="d-flex justify-content-between align-items-start">
              <div>
                  <h5 class="fw-bold">${materi.judul_materi}</h5>
                  <p class="text-muted mb-2">${materi.deskripsi}</p>
                  <small class="text-secondary d-block mb-2">Diupload pada ${materi.tgl_up}</small>
              </div>

              <div class="d-flex gap-2 align-self-center">
                  <button class="btn btn-warning text-white btn-sm btn-edit" data-id="${materi.id_materi}">Edit</button>
                  <button class="btn btn-danger btn-sm btn-delete" data-id="${materi.id_materi}">Hapus</button>
              </div>
          </div>

          <div class="mt-3">
              ${materi.files.map(file => renderFileItem(file)).join("")}
          </div>
        `;
        listMateri.prepend(card);
    }

    // ===== Render file/link item =====
    function renderFileItem(file) {
        let icon = "bi-file-earmark-text";
        if (file.tipe_file === "pdf") icon = "bi-file-earmark-pdf";
        else if (file.tipe_file === "mp4") icon = "bi-play-circle";
        else if (file.tipe_file === "gambar") icon = "bi-image";
        else if (file.tipe_file === "link") icon = "bi-link-45deg";

        const href = file.tipe_file === "link" ? file.link_url : `/storage/${file.file_path}`;
        const text = file.tipe_file === "link" ? file.link_url : "Lihat File";

        return `
          <div class="file-item">
              <i class="bi ${icon}"></i>
              <a href="${href}" target="_blank" class="text-decoration-none">${text}</a>
          </div>
        `;
    }
});
