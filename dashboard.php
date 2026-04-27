<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Shinigami Vault</title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="assets/logo.png" />
</head>

<?php include "connection.php"; ?>

<!-- ── HEADER ──────────────────────────────────── -->
<header>
    <a class="brand" href="#">Shinigami Vault</a>
    <div class="header-right">
        <span class="header-date" id="headerDate"></span>
        <button class="admin-badge">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <circle cx="12" cy="8" r="4" />
                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
            </svg>
            admin 01
        </button>
    </div>
</header>

<!-- toast -->
<div class="toast-msg" id="toast-msg">
    <i id="toast-icon" class="bi bi-x-circle-fill"></i>
    <span id="toast-text" class="toast-text"></span>
</div>

<!-- ── BODY LAYOUT ─────────────────────────────── -->
<div class="layout">

    <!-- SIDEBAR -->
    <aside>
        <p class="sidebar-label-header mb-3">Admin Control Panel</p>

        <div class="nav-group">
            <p class="sidebar-label" style="margin-top:12px;">main</p>
            <div class="nav-item" onclick="setActive(this); showSection('add-product')">
                <span class="plus">🏠︎</span> dashboard
            </div>
        </div>

        <div class="sidebar-divider"></div>

        <div class="nav-group">
            <p class="sidebar-label" style="margin-top:12px;">Products</p>
            <div class="nav-item active" onclick="setActive(this); showSection('add-product')">
                <span class="plus">+</span> add new product
            </div>
            <div class="nav-item" onclick="setActive(this); showSection('add-stocks')">
                <span class="plus">+</span> add new stocks
            </div>
            <div class="nav-item" onclick="setActive(this)">
                <span class="plus">+</span> Inventory
            </div>
            <div class="nav-item" onclick="setActive(this)">
                <span class="plus">+</span> collections
            </div>

        </div>

        <div class="sidebar-divider"></div>

        <div class="nav-group">
            <p class="sidebar-label" style="margin-top:12px;">store</p>
            <div class="nav-item" onclick="setActive(this); showSection('add-product')">
                <span class="plus">+</span> customers
            </div>
            <div class="nav-item" onclick="setActive(this)">
                <span class="plus">+</span> orders
            </div>

        </div>

        <div class="sidebar-divider"></div>

        <div class="nav-group">
            <p class="sidebar-label">account</p>
            <div class="nav-item" onclick="setActive(this)">
                <span class="plus">+</span> settings
            </div>
        </div>

        <button class="logout-btn" onclick="alert('Logging out…')"> Log Out ➜]</button>
    </aside>

    <!-- MAIN PANEL -->
    <main>

        <!-- Add new Product -->
        <section class="dashboard-sec" id="sec-add-product">
            <h2 class="panel-title">add new product</h2>

            <div class="form-row">
                <!-- Title -->
                <div class="field-wrap">
                    <input class="field-input" type="text" id="anp_title" placeholder=" " />
                    <label class="field-label" for="anp_title">Title</label>
                </div>
                <!-- Category -->
                <div class="field-wrap field-select-wrap">
                    <select class="field-select" id="anp_category"
                        onchange="this.classList.toggle('has-value', this.value !== ''); fetchTypes(this.value)">
                        <option value="" disabled selected hidden></option>
                        <?php
                        $cat_rs = Database::search("SELECT * FROM `category` ");
                        $cat_num = $cat_rs->num_rows;
                        for ($p = 0; $p < $cat_num; $p++) {
                            $cat_data = $cat_rs->fetch_assoc();
                        ?><option value="<?php echo $cat_data['id']; ?>"><?php echo $cat_data['name']; ?></option> <?php
                                                                                                                }
                                                                                                                    ?>
                    </select>
                    <label class="field-label" for="anp_category">Category</label>
                    <span class="chevron">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="form-row">
                <!-- Type -->
                <div class="field-wrap field-select-wrap">
                    <select class="field-select" id="anp_type"
                        onchange="this.classList.toggle('has-value', this.value !== '')">
                        <option value="" disabled selected hidden></option>
                    </select>
                    <label class="field-label" for="anp_type">Type</label>
                    <span class="chevron">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>
                </div>

                <!-- Collection -->
                <div class="field-wrap field-select-wrap">
                    <select class="field-select" id="anp_collection"
                        onchange="this.classList.toggle('has-value', this.value !== '')">
                        <option value="" disabled selected hidden></option>
                        <?php
                        $collection_rs = Database::search("SELECT * FROM `collection` ");
                        $collection_num = $collection_rs->num_rows;
                        for ($p = 0; $p < $collection_num; $p++) {
                            $collection_data = $collection_rs->fetch_assoc();
                        ?><option value="<?php echo $collection_data['id']; ?>"><?php echo $collection_data['name']; ?></option> <?php
                                                                                                                                }
                                                                                                                                    ?>
                    </select>
                    <label class="field-label" for="anp_collection">Collection</label>
                    <span class="chevron">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Description -->
            <div class="textarea-wrap">
                <textarea class="field-textarea" id="anp_description" placeholder=" "></textarea>
                <label class="textarea-label" for="anp_description">Description</label>
            </div>

            <!-- Save btn -->
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-6">
                    <button class="primary-btn" onclick="handleProductSave()">Save Product</button>
                </div>
            </div>
        </section>

        <!-- Add new stocks -->
        <section class="dashboard-sec" id="sec-add-stocks">
            <h2 class="panel-title">add new stocks</h2>

            <div class="form-row">

                <!-- Item -->
                <div class="field-wrap field-select-wrap">
                    <select class="field-select" id="ans_item"
                        onchange="this.classList.toggle('has-value', this.value !== '')">
                        <option value="" disabled selected hidden></option>
                        <?php
                        $item_rs = Database::search("SELECT * FROM `product` ");
                        $item_num = $item_rs->num_rows;
                        for ($p = 0; $p < $item_num; $p++) {
                            $item_data = $item_rs->fetch_assoc();
                        ?><option value="<?php echo $item_data['id']; ?>"><?php echo $item_data['title']; ?></option> <?php
                                                                                                                }
                                                                                                                    ?>
                    </select>
                    <label class="field-label" for="ans_item">Item</label>
                    <span class="chevron">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>
                </div>

                <!-- size -->
                <div class="field-wrap field-select-wrap">
                    <select class="field-select" id="ans_size"
                        onchange="this.classList.toggle('has-value', this.value !== '')">
                        <option value="" disabled selected hidden></option>
                        <?php
                        $size_rs = Database::search("SELECT * FROM `size` ");
                        $size_num = $size_rs->num_rows;
                        for ($p = 0; $p < $size_num; $p++) {
                            $size_data = $size_rs->fetch_assoc();
                        ?><option value="<?php echo $size_data['id']; ?>"><?php echo $size_data['value']; ?></option> <?php
                                                                                                                }
                                                                                                                    ?>
                    </select>
                    <label class="field-label" for="ans_size">size</label>
                    <span class="chevron">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="form-row">
                <!-- color -->
                <div class="field-wrap field-select-wrap">
                    <select class="field-select" id="ans_clr"
                        onchange="this.classList.toggle('has-value', this.value !== '')">
                        <option value="" disabled selected hidden></option>
                        <?php
                        $clr_rs = Database::search("SELECT * FROM `color` ");
                        $clr_num = $clr_rs->num_rows;
                        for ($p = 0; $p < $clr_num; $p++) {
                            $clr_data = $clr_rs->fetch_assoc();
                        ?><option value="<?php echo $clr_data['id']; ?>"><?php echo $clr_data['name']; ?></option> <?php
                                                                                                                }
                                                                                                                    ?>
                    </select>
                    <label class="field-label" for="ans_clr">color</label>
                    <span class="chevron">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>
                </div>
                <!-- price -->
                <div class="field-wrap">
                    <input class="field-input" type="text" id="ans_price" placeholder=" " />
                    <label class="field-label" for="ans_price">unit price</label>
                </div>

            </div>

            <!-- Product Images -->
            <div class="image-upload-wrap">
                <input type="file" id="product-image" accept="image/*" multiple hidden
                    onchange="previewImages(event)" />

                <div class="image-upload-area" id="upload-area">

                    <!-- Empty state -->
                    <label class="upload-placeholder" for="product-image" id="upload-placeholder">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5">
                            <rect x="3" y="3" width="18" height="18" rx="4" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                        <span class="upload-label">Click to upload product images</span>
                        <span class="upload-sub">PNG, JPG, WEBP — maximun 3 images</span>
                    </label>

                    <!-- Grid (lives inside the box) -->
                    <div class="image-preview-grid hidden" id="preview-grid">
                        <!-- thumbs injected here -->
                        <!-- Add more cell -->
                        <label class="add-more-thumb" for="product-image">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </label>
                    </div>

                </div>
            </div>

            <!-- Save btn -->
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-6">
                    <button class="primary-btn" onclick="handleStockSave();">add stocks</button>
                </div>
            </div>
        </section>
    </main>

</div>

<body>

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>

<script>
    // upload images
    let uploadedFiles = [];

    function previewImages(event) {
        const files = Array.from(event.target.files);
        files.forEach(file => {
            if (uploadedFiles.length >= 3) return;
            const id = Date.now() + Math.random();
            uploadedFiles.push({
                id,
                file
            });
            const reader = new FileReader();
            reader.onload = (e) => addThumb(id, e.target.result);
            reader.readAsDataURL(file);
        });
        event.target.value = '';
        updateUploadState();
    }

    function addThumb(id, src) {
        const addMore = document.querySelector('.add-more-thumb');
        const thumb = document.createElement('div');
        thumb.className = 'preview-thumb';
        thumb.id = 'thumb-' + id;
        thumb.innerHTML = `
        <img src="${src}" alt="Product image" />
        <button class="remove-thumb" onclick="removeThumb(${id})">✕</button>
    `;
        addMore.insertAdjacentElement('beforebegin', thumb);
        updateAddMoreVisibility();
    }

    function removeThumb(id) {
        uploadedFiles = uploadedFiles.filter(f => f.id !== id);
        const thumb = document.getElementById('thumb-' + id);
        if (thumb) thumb.remove();
        updateUploadState();
        updateAddMoreVisibility();
    }

    function updateUploadState() {
        const placeholder = document.getElementById('upload-placeholder');
        const grid = document.getElementById('preview-grid');
        if (uploadedFiles.length > 0) {
            placeholder.classList.add('hidden');
            grid.classList.remove('hidden');
        } else {
            placeholder.classList.remove('hidden');
            grid.classList.add('hidden');
        }
    }

    function updateAddMoreVisibility() {
        const addMore = document.querySelector('.add-more-thumb');
        if (uploadedFiles.length >= 3) {
            addMore.classList.add('hidden');
        } else {
            addMore.classList.remove('hidden');
        }
    }

    /* Live date */
    (function() {
        const days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        const months = ['january', 'february', 'march', 'april', 'may', 'june',
            'july', 'august', 'september', 'october', 'november', 'december'
        ];
        const now = new Date();
        document.getElementById('headerDate').textContent =
            `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]}`;
    })();

    /* Sidebar active state */
    function setActive(el) {
        document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
        el.classList.add('active');
    }


    function showSection(name) {
        document.querySelectorAll('.dashboard-sec').forEach(sec => {
            sec.style.display = 'none';
        });
        const target = document.getElementById('sec-' + name);
        if (target) target.style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.dashboard-sec').forEach(sec => {
            sec.style.display = 'none';
        });
        const defaultSec = document.getElementById('sec-add-product');
        if (defaultSec) defaultSec.style.display = 'block';
    });

    function fetchTypes(categoryId) {
        var typeSelect = document.getElementById('anp_type');

        typeSelect.innerHTML = '<option value="" disabled selected hidden></option>';
        typeSelect.classList.remove('has-value');

        if (!categoryId) return;

        fetch(`getTypes.php?category_id=${categoryId}`)
            .then(res => res.json())
            .then(types => {
                types.forEach(type => {
                    const option = document.createElement('option');
                    option.value = type.id;
                    option.textContent = type.name;
                    typeSelect.appendChild(option);
                });
            })
            .catch(err => console.error('Error fetching types:', err));
    }
</script>

<style>
    body {
        background: var(--light-bg);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 36px;
        height: 68px;
        background: var(--white);
        border-bottom: 1px solid #dcdcdc;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .brand {
        font-family: 'header';
        font-size: 1.55rem;
        font-weight: 700;
        color: var(--red);
        letter-spacing: 0.04em;
        text-transform: uppercase;
        text-decoration: none;
        transition: color 0.22s ease;
    }

    .brand:hover {
        color: #c02a2a;
    }


    .header-right {
        display: flex;
        align-items: center;
        gap: 28px;
    }

    .header-date {
        font-size: 0.65rem;
        letter-spacing: 0.14em;
        color: var(--dark-grey);
    }

    .admin-badge {
        display: flex;
        align-items: center;
        gap: 9px;
        border: 1.5px solid #dcdcdc;
        border-radius: 9px;
        padding: 8px 16px;
        font-size: 0.65rem;
        letter-spacing: 0.1em;
        cursor: pointer;
        background: transparent;
        transition: border-color 0.22s ease, background 0.22s ease;
    }

    .admin-badge:hover {
        border-color: #9e9e9e;
        background: var(--hero-bg);
    }

    .admin-badge svg {
        flex-shrink: 0;
        opacity: .5;
        color: var(--dark-grey);
    }

    /* BODY LAYOUT  */
    .layout {
        display: flex;
        flex: 1;
        padding: 24px 24px 32px;
        gap: 20px;
    }

    /*  SIDEBAR  */
    aside {
        width: 280px;
        min-width: 280px;
        background: var(--white);
        border: 1px solid #dcdcdc;
        border-radius: 14px;
        padding: 20px 0 24px;
        display: flex;
        flex-direction: column;
        height: fit-content;
        position: sticky;
        top: 92px;
    }

    .sidebar-label-header {
        font-size: 0.58rem;
        letter-spacing: 0.2em;
        color: #9e9e9e;
        padding: 0 22px;
        margin-bottom: 6px;
        text-align: center;
    }

    .sidebar-label {
        font-size: 0.58rem;
        letter-spacing: 0.2em;
        color: #9e9e9e;
        padding: 0 22px;
        margin-bottom: 7px;
    }

    .nav-group {
        margin-bottom: 10px;
    }

    .nav-group:last-of-type {
        margin-bottom: 0;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 22px;
        font-size: 0.6rem;
        letter-spacing: 0.12em;
        color: #9e9e9e;
        cursor: pointer;
        border-left: 3px solid transparent;
        transition: color 0.22s ease, background 0.22s ease, border-color 0.22s ease;
        user-select: none;
    }

    .nav-item:hover {
        color: var(--dark-grey);
        background: var(--hero-bg);
    }

    .nav-item.active {
        color: var(--dark-grey);
        font-weight: 600;
        background: var(--hero-bg);
        border-left-color: var(--red);
    }

    .nav-item .plus {
        color: var(--red);
        font-size: 1rem;
        line-height: 1;
        flex-shrink: 0;
    }

    .sidebar-divider {
        height: 1px;
        background: #dcdcdc;
        margin: 8px 22px 20px;
    }

    .logout-btn {
        display: block;
        margin: 32px 22px 0;
        font-family: 'sub';
        font-size: 0.6rem;
        letter-spacing: 0.16em;
        color: var(--red);
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
        transition: color 0.22s ease;
    }

    .logout-btn:hover {
        color: #c02a2a;
    }


    /*  MAIN PANEL  */
    main {
        flex: 1;
        background: var(--white);
        border: 1px solid #dcdcdc;
        border-radius: 14px;
        padding: 40px 48px 48px;
        animation: fadeUp .35s ease both;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .panel-title {
        font-size: 0.95rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-align: center;
        color: var(--dark-grey);
        margin-bottom: 36px;
    }

    /*  FORM GRID  */
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
        margin-bottom: 18px;
    }

    .field-wrap {
        position: relative;
    }

    .field-label {
        position: absolute;
        top: 50%;
        left: 18px;
        transform: translateY(-50%);
        font-size: 0.6rem;
        letter-spacing: 0.14em;
        color: #9e9e9e;
        pointer-events: none;
        transition: all 0.22s ease;
    }

    /* Float label when focused or filled */
    .field-wrap input:focus+.field-label,
    .field-wrap input:not(:placeholder-shown)+.field-label,
    .field-wrap select:focus+.field-label,
    .field-wrap select.has-value+.field-label {
        top: 12px;
        font-size: 0.5rem;
        color: var(--red);
    }

    .field-input,
    .field-select {
        width: 100%;
        height: 58px;
        border: 1.5px solid #dcdcdc;
        border-radius: 9px;
        background: var(--white);
        padding: 24px 18px 8px;
        font-family: 'sub';
        font-size: 0.65rem;
        letter-spacing: 0.06em;
        color: var(--dark-grey);
        outline: none;
        appearance: none;
        transition: border-color 0.22s ease, box-shadow 0.22s ease;
    }

    .field-input:focus,
    .field-select:focus {
        border-color: var(--dark-grey);
        box-shadow: 0 0 0 3px rgba(42, 42, 42, .06);
    }

    .field-select-wrap {
        position: relative;
    }

    .field-select-wrap .chevron {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #9e9e9e;
    }

    .textarea-wrap {
        position: relative;
        margin-bottom: 32px;
    }

    .textarea-label {
        position: absolute;
        top: 18px;
        left: 18px;
        font-size: 0.6rem;
        letter-spacing: 0.14em;
        color: #9e9e9e;
        pointer-events: none;
        transition: all 0.22s ease;
    }

    .field-textarea {
        width: 100%;
        min-height: 200px;
        border: 1.5px solid #dcdcdc;
        border-radius: 9px;
        background: var(--white);
        padding: 38px 18px 16px;
        font-family: 'sub';
        font-size: 0.65rem;
        letter-spacing: 0.04em;
        color: var(--dark-grey);
        outline: none;
        resize: vertical;
        line-height: 1.7;
        transition: border-color 0.22s ease, box-shadow 0.22s ease;
    }

    .field-textarea:focus {
        border-color: var(--dark-grey);
        box-shadow: 0 0 0 3px rgba(42, 42, 42, .06);
    }

    .field-textarea:focus+.textarea-label,
    .field-textarea:not(:placeholder-shown)+.textarea-label {
        top: 12px;
        font-size: 0.5rem;
        color: var(--red);
    }


    /* ── TOAST ───────────────────────────────── */
    .toast-msg {
        position: fixed;
        top: 12vh;
        right: 1.5rem;
        background-color: var(--red);
        padding: 0.75rem 1.2rem;
        border-radius: 6px;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-size: 0.78rem;
        letter-spacing: 0.05em;
        z-index: 999;
        opacity: 0;
        transform: translateY(-8px);
        transition: opacity 0.3s ease, transform 0.3s ease;
        pointer-events: none;
    }

    .toast-text {
        color: var(--white);
    }

    .toast-msg.show {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .toast-msg i {
        color: var(--white);
        font-size: 1rem;
    }


    /* PRODUCT IMAGE UPLOAD */
    .image-upload-wrap {
        position: relative;
        margin-bottom: 32px;
    }

    .image-upload-area {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 180px;
        border: 1.5px dashed #dcdcdc;
        border-radius: 9px;
        background: var(--white);
        transition: border-color 0.22s ease, background 0.22s ease;
        padding: 12px;
    }

    .image-upload-area:has(#preview-grid:not(.hidden)) {
        align-items: start;
        justify-content: start;
    }

    .upload-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        padding: 24px;
        color: #9e9e9e;
        cursor: pointer;
        width: 100%;
        justify-content: center;
        transition: background 0.22s ease;
        border-radius: 6px;
    }

    .upload-placeholder:hover {
        background: var(--hero-bg);
    }

    .upload-placeholder svg {
        color: #9e9e9e;
    }

    .upload-label {
        font-size: 0.65rem;
        letter-spacing: 0.12em;
        color: var(--dark-grey);
    }

    .upload-sub {
        font-size: 0.55rem;
        letter-spacing: 0.1em;
        color: #9e9e9e;
    }

    /* GRID INSIDE BOX */
    .image-preview-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        width: 100%;
    }

    .preview-thumb {
        position: relative;
        border-radius: 7px;
        overflow: hidden;
        border: 1.5px solid #dcdcdc;
        aspect-ratio: 1 / 1;
    }

    .preview-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .remove-thumb {
        position: absolute;
        top: 5px;
        right: 5px;
        background: var(--red);
        color: var(--white) !important;
        border: none;
        border-radius: 5px;
        padding: 2px 7px;
        font-size: 0.55rem;
        letter-spacing: 0.08em;
        cursor: pointer;
        font-family: 'sub';
        opacity: 0;
        transition: opacity 0.2s ease, background 0.2s ease;
    }

    .preview-thumb:hover .remove-thumb {
        opacity: 1;
    }

    .remove-thumb:hover {
        background: #c02a2a;
    }

    /* ADD MORE CELL */
    .add-more-thumb {
        display: flex;
        align-items: center;
        justify-content: center;
        aspect-ratio: 1 / 1;
        border: 1.5px dashed #dcdcdc;
        border-radius: 7px;
        cursor: pointer;
        color: #9e9e9e;
        transition: border-color 0.22s ease, background 0.22s ease, color 0.22s ease;
    }

    .add-more-thumb:hover {
        border-color: var(--dark-grey);
        background: var(--hero-bg);
        color: var(--dark-grey);
    }

    .hidden {
        display: none !important;
    }
</style>