let cropper;

document.addEventListener("DOMContentLoaded", function () {
    const profileContainer = document.getElementById("profile-container");
    const profileImage = document.getElementById("newImage");
    const newUsernameInput = $("#username");
    const cancelButton = document.getElementById("cancel-button");
    const saveButton = document.getElementById("save-button");

    const newImage = $("#newImage")[0];
    const modalImage = $("#modal-image")[0];
    const cropButton = $("#crop-button")[0];
    const imageModal = $("#imageModal")[0];

    profileContainer.addEventListener("click", function () {
        newImage.click();
    });

    newImage.addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                modalImage.src = e.target.result;

                imageModal.style.display = "block";

                modalImage.onload = function () {
                    cropper = new Cropper(modalImage, {
                        aspectRatio: 1,
                        viewMode: 2,
                        autoCropArea: 1,
                    });
                };
            };
            reader.readAsDataURL(file);
        }
    });

    cropButton.addEventListener("click", function () {
        if (cropper) {
            const croppedCanvas = cropper.getCroppedCanvas();

            if (croppedCanvas) {
                croppedCanvas.toBlob(function (blob) {
                    if (blob) {
                        const formData = new FormData();
                        formData.append("newImage", blob);

                        const newUsername = newUsernameInput.val();
                        formData.append("#username", newUsername);
                        formData.append("newImage", $("#newImage").val());

                        $.ajax({
                            url: $("#uploadForm").attr("action"),
                            type: $("#uploadForm").attr("method"),
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                console.log(response);
                                
                                profileImage.src = modalImage.src;
                                $("#imageModal").hide();

                                location.reload();
                            },
                            error: function (error) {
                                console.error("Erro na solicitação AJAX:", error);
                            },
                        });
                    } else {
                        console.error('Erro ao cortar a imagem.');
                    }
                });
            } else {
                console.error('Erro ao cortar a imagem: cropper não definido.');
            }
        } else {
            console.error('Erro ao cortar a imagem: cropper não inicializado.');
        }
    });

    window.addEventListener("click", function (event) {
        if (event.target === imageModal) {
            imageModal.style.display = "none";
            if (cropper) {
                cropper.destroy();
            }
        }
    });
});
