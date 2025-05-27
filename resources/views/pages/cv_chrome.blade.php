<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chrome CV Editor</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f1f3f4;
            min-height: 100vh;
        }

        .browser-frame {
            max-width: 1200px;
            margin: 20px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .browser-header {
            background: #e8eaed;
            padding: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid #dadce0;
        }

        .window-controls {
            display: flex;
            gap: 6px;
        }

        .control-btn {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
        }

        .close { background: #ff5f56; }
        .minimize { background: #ffbd2e; }
        .maximize { background: #27ca3f; }

        .address-bar {
            flex: 1;
            background: white;
            border: 1px solid #dadce0;
            border-radius: 20px;
            padding: 6px 16px;
            margin-left: 60px;
            font-size: 13px;
            color: #5f6368;
        }

        .toolbar {
            background: #f8f9fa;
            padding: 16px;
            border-bottom: 1px solid #e8eaed;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .edit-mode-toggle {
            background: #1a73e8;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.2s;
        }

        .edit-mode-toggle:hover {
            background: #1557b0;
        }

        .download-btn {
            background: #34a853;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.2s;
        }

        .download-btn:hover {
            background: #2d8f47;
        }

        .cv-container {
            padding: 40px;
            background: white;
            min-height: 600px;
        }

        .cv-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid #1a73e8;
        }

        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 20px;
            background: #e8eaed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: #5f6368;
            overflow: hidden;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        h1 {
            color: #1a73e8;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .job-title {
            color: #5f6368;
            font-size: 18px;
            margin-bottom: 16px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .contact-item {
            color: #5f6368;
            font-size: 14px;
        }

        .cv-section {
            margin-bottom: 30px;
        }

        .section-title {
            color: #1a73e8;
            font-size: 20px;
            margin-bottom: 16px;
            padding-left: 12px;
            border-left: 4px solid #1a73e8;
        }

        .section-content {
            line-height: 1.6;
            color: #202124;
        }

        .skill-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .skill-item {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 8px;
            border-left: 4px solid #34a853;
        }

        .experience-item, .education-item {
            margin-bottom: 20px;
            padding: 16px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #fbbc04;
        }

        .item-title {
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 4px;
        }

        .item-company, .item-school {
            color: #34a853;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .item-date {
            color: #5f6368;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .editable {
            border: 2px dashed transparent;
            padding: 4px;
            transition: all 0.2s;
        }

        .edit-mode .editable:hover {
            border-color: #1a73e8;
            background: rgba(26, 115, 232, 0.05);
        }

        .edit-mode .editable:focus {
            outline: none;
            border-color: #1a73e8;
            background: rgba(26, 115, 232, 0.1);
        }

        .photo-upload {
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .photo-upload:hover {
            transform: scale(1.05);
        }

        .photo-upload input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 2;
        }

        .photo-upload-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(26, 115, 232, 0.8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s ease;
            font-size: 24px;
            z-index: 1;
        }

        .edit-mode .photo-upload:hover .photo-upload-overlay {
            opacity: 1;
        }

        .edit-mode .photo-upload::after {
            content: "";
        }

        .add-section-btn {
            background: #ea4335;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 16px;
            transition: background 0.2s;
            display: none;
        }

        .edit-mode .add-section-btn {
            display: inline-block;
        }

        .add-section-btn:hover {
            background: #d33b2c;
        }

        .item-controls {
            display: none;
            gap: 8px;
            margin-top: 12px;
        }

        .edit-mode .item-controls {
            display: flex;
        }

        .control-btn-small {
            background: #f8f9fa;
            border: 1px solid #dadce0;
            color: #5f6368;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.2s;
        }

        .control-btn-small:hover {
            background: #e8eaed;
        }

        .delete-btn {
            background: #ea4335;
            color: white;
        }

        .delete-btn:hover {
            background: #d33b2c;
        }

        .edit-btn {
            background: #1a73e8;
            color: white;
        }

        .edit-btn:hover {
            background: #1557b0;
        }

        .skill-item-controls {
            display: none;
            gap: 8px;
            margin-top: 8px;
        }

        .edit-mode .skill-item-controls {
            display: flex;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .add-skill-btn {
            background: #34a853;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            display: none;
        }

        .edit-mode .add-skill-btn {
            display: block;
        }

        .add-skill-btn:hover {
            background: #2d8f47;
        }

        @media print {
            .browser-header, .toolbar {
                display: none;
            }
            .browser-frame {
                box-shadow: none;
                margin: 0;
            }
            .cv-container {
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .cv-container {
                padding: 20px;
            }

            .contact-info {
                flex-direction: column;
                align-items: center;
                gap: 8px;
            }

            .skill-grid {
                grid-template-columns: 1fr;
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
                <div class="profile-photo photo-upload">
                    <input type="file" accept="image/*" onchange="handlePhotoUpload(event)" title="Click để thay đổi ảnh đại diện">
                    <div id="photoPreview">👤</div>
                    <div class="photo-upload-overlay">📷</div>
                </div>
                <h1 class="editable" contenteditable="false">Nguyễn Văn A</h1>
                <div class="job-title editable" contenteditable="false">Lập trình viên Full-stack</div>
                <div class="contact-info">
                    <div class="contact-item editable" contenteditable="false">📧 email@example.com</div>
                    <div class="contact-item editable" contenteditable="false">📱 0123 456 789</div>
                    <div class="contact-item editable" contenteditable="false">📍 TP. Hồ Chí Minh</div>
                    <div class="contact-item editable" contenteditable="false">🔗 linkedin.com/in/profile</div>
                </div>
            </div>

            <div class="cv-section">
                <h2 class="section-title">Giới thiệu</h2>
                <div class="section-content editable" contenteditable="false">
                    Lập trình viên với 3+ năm kinh nghiệm phát triển ứng dụng web và mobile. Có kinh nghiệm làm việc với React, Node.js, và các công nghệ hiện đại. Đam mê học hỏi công nghệ mới và giải quyết các vấn đề phức tạp.
                </div>
            </div>

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
                            • Phát triển và duy trì các ứng dụng web sử dụng React và TypeScript<br>
                            • Làm việc trong team Agile, tham gia vào việc planning và review code<br>
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
                            • Xây dựng API backend với Node.js và Express<br>
                            • Phát triển giao diện người dùng với React<br>
                            • Tham gia thiết kế database và tối ưu queries
                        </div>
                        <div class="item-controls">
                            <button class="control-btn-small delete-btn" onclick="deleteItem(this)">🗑️ Xóa</button>
                        </div>
                    </div>
                </div>
            </div>

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
                // Kiểm tra kích thước file (giới hạn 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File ảnh quá lớn! Vui lòng chọn ảnh dưới 5MB.');
                    return;
                }

                // Kiểm tra định dạng file
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Định dạng file không được hỗ trợ! Vui lòng chọn file JPG, PNG, GIF hoặc WebP.');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    try {
                        const photoPreview = document.getElementById('photoPreview');
                        photoPreview.innerHTML = `<img src="${e.target.result}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`;

                        // Lưu ảnh vào sessionStorage
                        cvData.photo = e.target.result;
                        sessionStorage.setItem('cvData', JSON.stringify(cvData));

                        console.log('Ảnh đã được tải lên thành công!');
                    } catch (error) {
                        console.error('Lỗi khi xử lý ảnh:', error);
                        alert('Có lỗi xảy ra khi tải ảnh. Vui lòng thử lại!');
                    }
                };

                reader.onerror = function() {
                    alert('Có lỗi xảy ra khi đọc file ảnh!');
                };

                reader.readAsDataURL(file);
            }
        }

        // Download CV as PDF
        function downloadCV() {
            const originalTitle = document.title;
            document.title = 'CV - ' + document.querySelector('h1').textContent;

            // Hide edit elements temporarily
            const toolbar = document.querySelector('.toolbar');
            const browserHeader = document.querySelector('.browser-header');
            toolbar.style.display = 'none';
            browserHeader.style.display = 'none';

            // Trigger print dialog
            window.print();

            // Restore elements
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

            // Enable editing for new elements
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

            // Enable editing for new elements
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

            // Enable editing for new elements
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

            // Enable editing for new elements
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
                button.closest('.experience-item, .education-item').remove();
                saveData();
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
