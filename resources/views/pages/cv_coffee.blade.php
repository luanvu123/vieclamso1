<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CV Coffee Frame</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f7ede2;
            margin: 0;
            padding: 20px;
            color: #50443b;
        }

        .browser-frame {
            background: #fff8f0;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(154, 82, 10, 0.25);
            max-width: 900px;
            margin: 0 auto;
            overflow: hidden;
            border: 4px solid #d99a1c;
        }

        .browser-header {
            background: #a36309;
            color: #fff2cc;
            padding: 12px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .window-controls {
            display: flex;
            gap: 10px;
        }

        .control-btn {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: transform 0.15s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
        }

        .control-btn.close {
            background: #d72631;
        }

        .control-btn.close:hover {
            transform: scale(1.1);
        }

        .control-btn.minimize {
            background: #f4bf4f;
        }

        .control-btn.minimize:hover {
            transform: scale(1.1);
        }

        .control-btn.maximize {
            background: #54a24b;
        }

        .control-btn.maximize:hover {
            transform: scale(1.1);
        }

        .address-bar {
            flex-grow: 1;
            margin-left: 12px;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.9rem;
            user-select: none;
        }

        .toolbar {
            background: #fbeabb;
            display: flex;
            justify-content: space-between;
            padding: 10px 16px;
            border-bottom: 2px solid #d99a1c;
        }

        .edit-mode-toggle,
        .download-btn {
            background: #d99a1c;
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            color: #fff8f0;
            font-weight: bold;
            cursor: pointer;
            font-size: 1rem;
            box-shadow: 0 3px 7px rgba(217, 154, 28, 0.7);
            transition: background-color 0.3s ease;
        }

        .edit-mode-toggle:hover,
        .download-btn:hover {
            background-color: #b57b00;
        }

        .cv-container {
            padding: 25px 40px 40px 40px;
        }

        .cv-header {
            display: flex;
            align-items: center;
            gap: 30px;
            border-bottom: 2px solid #d99a1c;
            padding-bottom: 20px;
        }

        .profile-photo {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 3px solid #d99a1c;
            background: #f5e1a4;
            position: relative;
            cursor: pointer;
            overflow: hidden;
            flex-shrink: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3rem;
            color: #a36309;
            transition: box-shadow 0.2s ease;
        }

        .profile-photo:hover .photo-upload-overlay {
            opacity: 0.7;
        }

        .photo-upload input {
            display: none;
        }

        .photo-upload-overlay {
            position: absolute;
            inset: 0;
            background: #d99a1c;
            color: white;
            opacity: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            user-select: none;
            transition: opacity 0.3s ease;
        }

        h1.editable {
            margin: 0;
            font-size: 2.2rem;
            font-weight: 900;
            letter-spacing: 1.5px;
            color: #7f5600;
        }

        .job-title.editable {
            font-style: italic;
            font-weight: 600;
            color: #b57b00;
            margin-top: 4px;
        }

        .contact-info {
            margin-top: 12px;
            font-size: 0.9rem;
            line-height: 1.5;
            color: #7f6000;
        }

        .contact-item {
            margin-bottom: 4px;
        }

        .cv-section {
            margin-top: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #9a6f03;
            border-bottom: 2px solid #d99a1c;
            padding-bottom: 6px;
            margin: 0;
        }

        .section-content.editable {
            margin-top: 10px;
            font-size: 1rem;
            color: #5a4816;
            border-bottom: 1px dashed transparent;
            padding-bottom: 6px;
        }

        .skill-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 12px;
        }

        .skill-item {
            background: #fff3c4;
            padding: 13px 15px;
            border-radius: 12px;
            width: calc(50% - 10px);
            box-shadow: inset 0 0 8px #d1b562;
        }

        .skill-item strong {
            display: block;
            margin-bottom: 6px;
            font-weight: 700;
            color: #a76700;
        }

        .skill-item-controls {
            margin-top: 8px;
        }

        .control-btn-small {
            background: #cc7b00;
            border: none;
            padding: 5px 10px;
            border-radius: 7px;
            color: #fff8f0;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(204, 123, 0, 0.7);
            transition: background-color 0.3s ease;
        }

        .control-btn-small:hover {
            background-color: #a05c00;
        }

        .experience-item,
        .education-item {
            background: #fff3c4;
            box-shadow: inset 0 0 10px #d1b562;
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
        }

        .item-title.editable,
        .item-company.editable,
        .item-date.editable {
            font-weight: 600;
            margin-bottom: 4px;
            color: #a76900;
        }

        .item-controls {
            margin-top: 10px;
            text-align: right;
        }

        .editable {
            border-bottom: 1px dashed transparent;
        }

        .edit-mode .editable {
            border-bottom: 1px dashed #a76700;
            cursor: text;
        }

        /* Scrollbar for containers */
        .cv-container {
            max-height: 85vh;
            overflow-y: auto;
        }

        /* For print */
        @media print {
            body {
                background: white;
                margin: 0;
                padding: 0;
                color: black;
            }

            .browser-header,
            .toolbar {
                display: none !important;
            }

            .browser-frame {
                border: none;
                box-shadow: none;
                max-width: 100%;
                margin: 0;
                border-radius: 0;
            }

            .cv-container {
                max-height: none;
                overflow: visible;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <div class="browser-frame">
        <div class="browser-header">
            <div class="window-controls">
                <button class="control-btn close"></button>
                <button class="control-btn minimize"></button>
                <button class="control-btn maximize"></button>
            </div>
            <div class="address-bar">chrome://cv-editor/my-resume</div>
        </div>

        <div class="toolbar">
            <button class="edit-mode-toggle" onclick="toggleEditMode()">
                Chế độ chỉnh sửa
            </button>
            <button class="download-btn" onclick="downloadCV()">
                💾 Tải xuống PDF
            </button>
        </div>

        <div class="cv-container" id="cvContainer">
            <div class="cv-header">
                <div class="profile-photo photo-upload" title="Click để thay đổi ảnh đại diện">
                    <input type="file" accept="image/*" onchange="handlePhotoUpload(event)">
                    <div id="photoPreview">👤</div>
                    <div class="photo-upload-overlay">📷</div>
                </div>
                <div>
                    <h1 class="editable" contenteditable="false">Nguyễn Văn A</h1>
                    <div class="job-title editable" contenteditable="false">Lập trình viên Full-stack</div>
                    <div class="contact-info">
                        <div class="contact-item editable" contenteditable="false">📧 email@example.com</div>
                        <div class="contact-item editable" contenteditable="false">📱 0123 456 789</div>
                        <div class="contact-item editable" contenteditable="false">📍 TP. Hồ Chí Minh</div>
                        <div class="contact-item editable" contenteditable="false">🔗 linkedin.com/in/profile</div>
                    </div>
                </div>
            </div>

            <!-- Giới thiệu -->
            <div class="cv-section">
                <h2 class="section-title">Giới thiệu</h2>
                <div class="section-content editable" contenteditable="false">
                    Lập trình viên với 3+ năm kinh nghiệm phát triển ứng dụng web và mobile. Có kinh nghiệm làm việc với
                    React, Node.js, và các công nghệ hiện đại. Đam mê học hỏi công nghệ mới và giải quyết các vấn đề
                    phức tạp.
                </div>
            </div>

            <!-- Kỹ năng -->
            <div class="cv-section">
                <div class="section-header">
                    <h2 class="section-title">Kỹ năng</h2>
                    <button class="add-skill-btn" onclick="addSkill()">+ Thêm kỹ năng</button>
                </div>
                <div class="skill-grid" id="skillGrid">
                    <div class="skill-item">
                        <strong>Frontend:</strong>
                        <div class="editable" contenteditable="false">React, Vue.js, HTML5, CSS3, JavaScript</div>
                        <div class="skill-item-controls">
                            <button class="control-btn-small delete-btn" onclick="deleteSkill(this)">🗑️ Xóa</button>
                        </div>
                    </div>
                    <div class="skill-item">
                        <strong>Backend:</strong>
                        <div class="editable" contenteditable="false">Node.js, Python, PHP, MySQL, MongoDB</div>
                        <div class="skill-item-controls">
                            <button class="control-btn-small delete-btn" onclick="deleteSkill(this)">🗑️ Xóa</button>
                        </div>
                    </div>
                    <div class="skill-item">
                        <strong>Tools:</strong>
                        <div class="editable" contenteditable="false">Git, Docker, AWS, Figma, VS Code</div>
                        <div class="skill-item-controls">
                            <button class="control-btn-small delete-btn" onclick="deleteSkill(this)">🗑️ Xóa</button>
                        </div>
                    </div>
                    <div class="skill-item">
                        <strong>Soft Skills:</strong>
                        <div class="editable" contenteditable="false">Teamwork, Communication, Problem Solving</div>
                        <div class="skill-item-controls">
                            <button class="control-btn-small delete-btn" onclick="deleteSkill(this)">🗑️ Xóa</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kinh nghiệm làm việc -->
            <div class="cv-section">
                <div class="section-header">
                    <h2 class="section-title">Kinh nghiệm làm việc</h2>
                    <button class="add-section-btn" onclick="addExperience()">+ Thêm kinh nghiệm</button>
                </div>
                <div id="experienceContainer">
                    <div class="experience-item">
                        <div class="item-title editable" contenteditable="false">Senior Frontend Developer</div>
                        <div class="item-company editable" contenteditable="false">Công ty ABC Technology</div>
                        <div class="item-date editable" contenteditable="false">01/2022 - Hiện tại</div>
                        <div class="editable" contenteditable="false">
                            • Phát triển và duy trì các ứng dụng web sử dụng React và TypeScript<br />
                            • Làm việc trong team Agile, tham gia vào việc planning và review code<br />
                            • Tối ưu hiệu suất ứng dụng, giảm loading time 40%
                        </div>
                        <div class="item-controls">
                            <button class="control-btn-small delete-btn" onclick="deleteItem(this)">🗑️ Xóa</button>
                        </div>
                    </div>
                    <div class="experience-item">
                        <div class="item-title editable" contenteditable="false">Junior Full-stack Developer</div>
                        <div class="item-company editable" contenteditable="false">Startup XYZ</div>
                        <div class="item-date editable" contenteditable="false">06/2020 - 12/2021</div>
                        <div class="editable" contenteditable="false">
                            • Xây dựng API backend với Node.js và Express<br />
                            • Phát triển giao diện người dùng với React<br />
                            • Tham gia thiết kế database và tối ưu queries
                        </div>
                        <div class="item-controls">
                            <button class="control-btn-small delete-btn" onclick="deleteItem(this)">🗑️ Xóa</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Học vấn -->
            <div class="cv-section">
                <div class="section-header">
                    <h2 class="section-title">Học vấn</h2>
                    <button class="add-section-btn" onclick="addEducation()">+ Thêm học vấn</button>
                </div>
                <div id="educationContainer">
                    <div class="education-item">
                        <div class="item-title editable" contenteditable="false">Cử nhân Công nghệ Thông tin</div>
                        <div class="item-school editable" contenteditable="false">Đại học Bách Khoa TP.HCM</div>
                        <div class="item-date editable" contenteditable="false">2016 - 2020</div>
                        <div class="editable" contenteditable="false">GPA: 3.5/4.0 - Tốt nghiệp Loại Khá</div>
                        <div class="item-controls">
                            <button class="control-btn-small delete-btn" onclick="deleteItem(this)">🗑️ Xóa</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dự án nổi bật -->
            <div class="cv-section">
                <div class="section-header">
                    <h2 class="section-title">Dự án nổi bật</h2>
                    <button class="add-section-btn" onclick="addProject()">+ Thêm dự án</button>
                </div>
                <div class="section-content" id="projectContainer">
                    <div class="experience-item">
                        <div class="item-title editable" contenteditable="false">E-commerce Platform</div>
                        <div class="item-date editable" contenteditable="false">2023</div>
                        <div class="editable" contenteditable="false">
                            Xây dựng platform thương mại điện tử hoàn chỉnh với React, Node.js, MongoDB.
                            Tích hợp thanh toán online, quản lý kho hàng và hệ thống admin.
                        </div>
                        <div class="item-controls">
                            <button class="control-btn-small delete-btn" onclick="deleteItem(this)">🗑️ Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let isEditMode = false;
        let cvData = {};

        // Load saved data
        function loadData() {
            const saved = sessionStorage.getItem('cvData');
            if (saved) {
                cvData = JSON.parse(saved);
                restoreData();
            }
        }

        // Save data to session storage
        function saveData() {
            const editables = document.querySelectorAll('.editable');
            editables.forEach(el => {
                const id = getElementId(el);
                cvData[id] = el.innerHTML || el.textContent;
            });

            // Save photo
            const photoImg = document.querySelector('#photoPreview img');
            if (photoImg) {
                cvData.photo = photoImg.src;
            }

            sessionStorage.setItem('cvData', JSON.stringify(cvData));
        }

        // Restore data from session storage
        function restoreData() {
            Object.keys(cvData).forEach(id => {
                if (id === 'photo') {
                    const photoPreview = document.getElementById('photoPreview');
                    if (photoPreview && cvData.photo) {
                        photoPreview.innerHTML = `<img src="${cvData.photo}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`;
                    }
                } else {
                    const element = document.querySelector(`[data-id="${id}"]`);
                    if (element && cvData[id]) {
                        element.innerHTML = cvData[id];
                    }
                }
            });
        }

        // Generate unique ID for elements
        function getElementId(element) {
            if (!element.dataset.id) {
                element.dataset.id = 'el_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
            }
            return element.dataset.id;
        }

        // Toggle edit mode
        function toggleEditMode() {
            isEditMode = !isEditMode;
            const container = document.getElementById('cvContainer');
            const button = document.querySelector('.edit-mode-toggle');

            if (isEditMode) {
                container.classList.add('edit-mode');
                button.textContent = 'Lưu & Thoát';
                enableEditing();
            } else {
                container.classList.remove('edit-mode');
                button.textContent = 'Chế độ chỉnh sửa';
                disableEditing();
                saveData();
            }
        }

        // Enable editing
        function enableEditing() {
            const editables = document.querySelectorAll('.editable');
            editables.forEach(el => {
                el.contentEditable = true;
                getElementId(el); // Assign ID if not exists

                // Auto-save on blur
                el.addEventListener('blur', saveData);
            });
        }

        // Disable editing
        function disableEditing() {
            const editables = document.querySelectorAll('.editable');
            editables.forEach(el => {
                el.contentEditable = false;
                el.removeEventListener('blur', saveData);
            });
        }

        // Handle photo upload
        function handlePhotoUpload(event) {
            const file = event.target.files[0];
            if (file) {
                if (file.size > 5 * 1024 * 1024) {
                    alert('File ảnh quá lớn! Vui lòng chọn ảnh dưới 5MB.');
                    return;
                }
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Định dạng file không được hỗ trợ! Vui lòng chọn file JPG, PNG, GIF hoặc WebP.');
                    return;
                }
                const reader = new FileReader();
                reader.onload = function (e) {
                    try {
                        const photoPreview = document.getElementById('photoPreview');
                        photoPreview.innerHTML = `<img src="${e.target.result}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`;
                        cvData.photo = e.target.result;
                        sessionStorage.setItem('cvData', JSON.stringify(cvData));
                    } catch (error) {
                        alert('Có lỗi xảy ra khi tải ảnh. Vui lòng thử lại!');
                    }
                };
                reader.onerror = function () {
                    alert('Có lỗi xảy ra khi đọc file ảnh!');
                };
                reader.readAsDataURL(file);
            }
        }

        // Download CV as PDF (print)
        function downloadCV() {
            const originalTitle = document.title;
            document.title = 'CV - ' + document.querySelector('h1').textContent;
            const toolbar = document.querySelector('.toolbar');
            const browserHeader = document.querySelector('.browser-header');
            toolbar.style.display = 'none';
            browserHeader.style.display = 'none';
            window.print();
            setTimeout(() => {
                toolbar.style.display = 'flex';
                browserHeader.style.display = 'flex';
                document.title = originalTitle;
            }, 100);
        }

        // Add new skill
        function addSkill() {
            const skillGrid = document.getElementById('skillGrid');
            const newSkill = document.createElement('div');
            newSkill.className = 'skill-item';
            newSkill.innerHTML = `
    <strong class="editable" contenteditable="${isEditMode}">Kỹ năng mới:</strong>
    <div class="editable" contenteditable="${isEditMode}">Nhập kỹ năng của bạn</div>
    <div class="skill-item-controls">
      <button class="control-btn-small delete-btn" onclick="deleteSkill(this)">🗑️ Xóa</button>
    </div>
  `;
            skillGrid.appendChild(newSkill);
            if (isEditMode) {
                const editables = newSkill.querySelectorAll('.editable');
                editables.forEach(el => {
                    getElementId(el);
                    el.addEventListener('blur', saveData);
                });
            }
            saveData();
        }

        // Delete skill
        function deleteSkill(button) {
            if (confirm('Bạn có chắc muốn xóa kỹ năng này?')) {
                button.closest('.skill-item').remove();
                saveData();
            }
        }

        // Add new experience
        function addExperience() {
            const container = document.getElementById('experienceContainer');
            const newExperience = document.createElement('div');
            newExperience.className = 'experience-item';
            newExperience.innerHTML = `
    <div class="item-title editable" contenteditable="${isEditMode}">Vị trí công việc</div>
    <div class="item-company editable" contenteditable="${isEditMode}">Tên công ty</div>
    <div class="item-date editable" contenteditable="${isEditMode}">Thời gian làm việc</div>
    <div class="editable" contenteditable="${isEditMode}">
      Mô tả công việc và thành tích...
    </div>
    <div class="item-controls">
      <button class="control-btn-small delete-btn" onclick="deleteItem(this)">🗑️ Xóa</button>
    </div>
  `;
            container.appendChild(newExperience);
            if (isEditMode) {
                const editables = newExperience.querySelectorAll('.editable');
                editables.forEach(el => {
                    getElementId(el);
                    el.addEventListener('blur', saveData);
                });
            }
            saveData();
        }

        // Add new education
        function addEducation() {
            const container = document.getElementById('educationContainer');
            const newEducation = document.createElement('div');
            newEducation.className = 'education-item';
            newEducation.innerHTML = `
    <div class="item-title editable" contenteditable="${isEditMode}">Bằng cấp/Chứng chỉ</div>
    <div class="item-school editable" contenteditable="${isEditMode}">Tên trường/Tổ chức</div>
    <div class="item-date editable" contenteditable="${isEditMode}">Thời gian học</div>
    <div class="editable" contenteditable="${isEditMode}">Mô tả thêm (GPA, thành tích...)</div>
    <div class="item-controls">
      <button class="control-btn-small delete-btn" onclick="deleteItem(this)">🗑️ Xóa</button>
    </div>
  `;
            container.appendChild(newEducation);
            if (isEditMode) {
                const editables = newEducation.querySelectorAll('.editable');
                editables.forEach(el => {
                    getElementId(el);
                    el.addEventListener('blur', saveData);
                });
            }
            saveData();
        }

        // Add new project
        function addProject() {
            const container = document.getElementById('projectContainer');
            const newProject = document.createElement('div');
            newProject.className = 'experience-item';
            newProject.innerHTML = `
    <div class="item-title editable" contenteditable="${isEditMode}">Tên dự án</div>
    <div class="item-date editable" contenteditable="${isEditMode}">Thời gian thực hiện</div>
    <div class="editable" contenteditable="${isEditMode}">
      Mô tả dự án, công nghệ sử dụng và kết quả đạt được...
    </div>
    <div class="item-controls">
      <button class="control-btn-small delete-btn" onclick="deleteItem(this)">🗑️ Xóa</button>
    </div>
  `;
            container.appendChild(newProject);
            if (isEditMode) {
                const editables = newProject.querySelectorAll('.editable');
                editables.forEach(el => {
                    getElementId(el);
                    el.addEventListener('blur', saveData);
                });
            }
            saveData();
        }

        // Delete item (experience, education, project)
        function deleteItem(button) {
            if (confirm('Bạn có chắc muốn xóa mục này?')) {
                const parent = button.closest('.experience-item, .education-item');
                if (parent) {
                    parent.remove();
                    saveData();
                }
            }
        }

        setInterval(() => {
            if (isEditMode) {
                saveData();
            }
        }, 30000);

        // Load data on page load
        window.addEventListener('load', loadData);

        // Save data before page unload
        window.addEventListener('beforeunload', () => {
            if (isEditMode) {
                saveData();
            }
        });

        // Initialize element IDs
        document.addEventListener('DOMContentLoaded', () => {
            const editables = document.querySelectorAll('.editable');
            editables.forEach(getElementId);
        });
    </script>

</body>

</html>
