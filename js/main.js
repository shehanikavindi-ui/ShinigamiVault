// ========== Switch Contents ==============
function showRegister() {
    document.querySelector('.auth-login-container').classList.add('d-none');
    document.querySelector('.auth-fp-container').classList.add('d-none');
    document.querySelector('.auth-newpw-container').classList.add('d-none');
    document.querySelector('.auth-register-container').classList.remove('d-none');
}
function showLogin() {
    document.querySelector('.auth-register-container').classList.add('d-none');
    document.querySelector('.auth-fp-container').classList.add('d-none');
    document.querySelector('.auth-newpw-container').classList.add('d-none');
    document.querySelector('.auth-login-container').classList.remove('d-none');
}
function showFP() {
    document.querySelector('.auth-register-container').classList.add('d-none');
    document.querySelector('.auth-login-container').classList.add('d-none');
    document.querySelector('.auth-newpw-container').classList.add('d-none');
    document.querySelector('.auth-fp-container').classList.remove('d-none');
}
function showNewPw() {
    document.querySelector('.auth-register-container').classList.add('d-none');
    document.querySelector('.auth-login-container').classList.add('d-none');
    document.querySelector('.auth-fp-container').classList.add('d-none');
    document.querySelector('.auth-newpw-container').classList.remove('d-none');
}

// goto
function gotoSearch() {
    window.location = "search.php";
}
function gotoHome() {
    window.location = "home.php";
}

// ============== Toast Box ===========
function showToast(msg, type = 'error') {
    const t = document.getElementById('toast-msg');
    const text = document.getElementById('toast-text');
    const icon = document.getElementById('toast-icon');

    text.textContent = msg;

    if (type === 'success') {
        t.style.backgroundColor = '#2a7a2a';
        icon.className = 'bi bi-check-circle-fill';
    } else {
        t.style.backgroundColor = 'var(--red)';
        icon.className = 'bi bi-x-circle-fill';
    }

    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
}

// ============== Product adding ===================
function handleProductSave() {
    const title = document.getElementById('anp_title').value.trim();
    const category = document.getElementById('anp_category').value;
    const type = document.getElementById('anp_type').value;
    const collection = document.getElementById('anp_collection').value;
    const description = document.getElementById('anp_description').value.trim();

    // Title
    if (!title) {
        showToast('⚠ Product title cannot be empty');
        document.getElementById('anp_title').focus();
        return;
    }
    if (title.length > 50) {
        showToast('⚠ Title must be 50 characters or less');
        document.getElementById('anp_title').focus();
        return;
    }

    // Category
    if (!category) {
        showToast('⚠ Please select a category');
        return;
    }

    // Type — depends on category being selected first
    if (!type) {
        showToast('⚠ Please select a type');
        return;
    }

    // Collection
    if (!collection) {
        showToast('⚠ Please select a collection');
        return;
    }

    // Description
    if (!description) {
        showToast('⚠ Description cannot be empty');
        document.getElementById('anp_description').focus();
        return;
    }

    // proceed to save
    var form = new FormData();
    form.append("title", title);
    form.append("cat", category);
    form.append("type", type);
    form.append("coll", collection);
    form.append("desc", description);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "success") {
                showToast('Product saved successfully ✓', 'success');
            } else {
                alert(response);
            }
        }
    }
    request.open("POST", "productSaveProcess.php", true);
    request.send(form);

    // Reset form
    document.getElementById('anp_title').value = '';
    document.getElementById('anp_description').value = '';
    ['anp_type', 'anp_category', 'anp_collection'].forEach(id => {
        const el = document.getElementById(id);
        el.selectedIndex = 0;
        el.classList.remove('has-value');
    });
}

// ============== Stocks adding ===================
// function handleStockSave() {
//     const item  = document.getElementById('ans_item').value;
//     const size  = document.getElementById('ans_size').value;
//     const color = document.getElementById('ans_clr').value;
//     const price = document.getElementById('ans_price').value.trim();

//     // Item
//     if (!item) {
//         showToast('⚠ Please select a product item');
//         return;
//     }

//     // Size
//     if (!size) {
//         showToast('⚠ Please select a size');
//         return;
//     }

//     // Color
//     if (!color) {
//         showToast('⚠ Please select a color');
//         return;
//     }

//     // Price
//     if (!price) {
//         showToast('⚠ Unit price cannot be empty');
//         document.getElementById('ans_price').focus();
//         return;
//     }
//     if (isNaN(price) || parseFloat(price) <= 0) {
//         showToast('⚠ Enter a valid price');
//         document.getElementById('ans_price').focus();
//         return;
//     }

//     // Images
//     if (uploadedFiles.length === 0) {
//         showToast('⚠ Please upload at least one product image');
//         return;
//     }

//     // Build FormData
//     const form = new FormData();
//     form.append('item',  item);
//     form.append('size',  size);
//     form.append('color', color);
//     form.append('price', parseFloat(price).toFixed(2));
//     uploadedFiles.forEach((f, i) => form.append('images[]', f.file));

//     const request = new XMLHttpRequest();
//     request.onreadystatechange = function () {
//         if (request.readyState === 4 && request.status === 200) {
//             if (request.responseText === 'success') {
//                 showToast('Stock added successfully ✓', 'success');

//                 // Reset stocks form
//                 ['ans_item', 'ans_size', 'ans_clr'].forEach(id => {
//                     const el = document.getElementById(id);
//                     el.selectedIndex = 0;
//                     el.classList.remove('has-value');
//                 });
//                 document.getElementById('ans_price').value = '';
//                 uploadedFiles = [];
//                 document.getElementById('preview-grid').innerHTML = `
//                     <label class="add-more-thumb" for="product-image">
//                         <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
//                             <line x1="12" y1="5" x2="12" y2="19"/>
//                             <line x1="5" y1="12" x2="19" y2="12"/>
//                         </svg>
//                     </label>`;
//                 updateUploadState();
//             } else {
//                 showToast('⚠ ' + request.responseText);
//             }
//         }
//     };
//     request.open('POST', 'stockSaveProcess.php', true);
//     request.send(form);
// }



// Flag — set when product+color combo already has images
let imagesAlreadyExist = false;

// Trigger this when BOTH item and color are selected
document.getElementById('ans_item').addEventListener('change', checkExistingImages);
document.getElementById('ans_clr').addEventListener('change', checkExistingImages);
function checkExistingImages() {
    const item  = document.getElementById('ans_item').value;
    const color = document.getElementById('ans_clr').value;
    if (!item || !color) return;

    fetch(`checkImages.php?product_id=${item}&color_id=${color}`)
        .then(res => res.json())
        .then(data => {
            imagesAlreadyExist = data.exists;
            const uploadWrap = document.querySelector('.image-upload-wrap');
            if (data.exists) {
                // Hide upload area, show existing images
                uploadWrap.innerHTML = `
                    <p class="existing-img-note">✓ Images already uploaded for this product + color</p>
                    <div class="image-preview-grid" style="display:grid">
                        ${data.images.map(path => `
                            <div class="preview-thumb">
                                <img src="${path}" alt="existing" />
                            </div>`).join('')}
                    </div>`;
            } else {
                // Restore upload area if switched back to new combo
                imagesAlreadyExist = false;
                uploadWrap.innerHTML = `
                    <input type="file" id="product-image" accept="image/*" multiple hidden onchange="previewImages(event)" />
                    <div class="image-upload-area" id="upload-area">
                        <label class="upload-placeholder" for="product-image" id="upload-placeholder">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="4"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <polyline points="21 15 16 10 5 21"/>
                            </svg>
                            <span class="upload-label">Click to upload product images</span>
                            <span class="upload-sub">PNG, JPG, WEBP — maximum 3 images</span>
                        </label>
                        <div class="image-preview-grid hidden" id="preview-grid">
                            <label class="add-more-thumb" for="product-image">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                            </label>
                        </div>
                    </div>`;
                uploadedFiles = [];
            }
        });
}
function handleStockSave() {
    const item  = document.getElementById('ans_item').value;
    const color = document.getElementById('ans_clr').value;
    const size  = document.getElementById('ans_size').value;
    const price = document.getElementById('ans_price').value.trim();
    const qty   = document.getElementById('ans_qty').value.trim();

    if (!item) {
        showToast('⚠ Please select a product item');
        return;
    }
    if (!color) {
        showToast('⚠ Please select a color');
        return;
    }
    if (!size) {
        showToast('⚠ Please select a size');
        return;
    }
    if (!price) {
        showToast('⚠ Unit price cannot be empty');
        document.getElementById('ans_price').focus();
        return;
    }
    if (isNaN(price) || parseFloat(price) <= 0) {
        showToast('⚠ Enter a valid price');
        document.getElementById('ans_price').focus();
        return;
    }
    if (!qty) {
        showToast('⚠ Quantity cannot be empty');
        document.getElementById('ans_qty').focus();
        return;
    }
    if (isNaN(qty) || parseInt(qty) <= 0) {
        showToast('⚠ Enter a valid quantity');
        document.getElementById('ans_qty').focus();
        return;
    }

    // Only require images if this is a new product+color combo
    if (!imagesAlreadyExist && uploadedFiles.length === 0) {
        showToast('⚠ Please upload at least one product image');
        return;
    }

    const form = new FormData();
    form.append('item',  item);
    form.append('color', color);
    form.append('size',  size);
    form.append('price', parseFloat(price).toFixed(2));
    form.append('qty',   parseInt(qty));
    form.append('images_exist', imagesAlreadyExist ? '1' : '0');

    if (!imagesAlreadyExist) {
        uploadedFiles.forEach(f => form.append('images[]', f.file));
    }

    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            if (request.responseText === 'success') {
                showToast('Stock added successfully ✓', 'success');

                ['ans_item', 'ans_size', 'ans_clr'].forEach(id => {
                    const el = document.getElementById(id);
                    el.selectedIndex = 0;
                    el.classList.remove('has-value');
                });
                document.getElementById('ans_price').value = '';
                document.getElementById('ans_qty').value   = '';
                uploadedFiles    = [];
                imagesAlreadyExist = false;
                updateUploadState();
            } else {
                showToast('⚠ ' + request.responseText);
            }
        }
    };
    request.open('POST', 'stockSaveProcess.php', true);
    request.send(form);
}