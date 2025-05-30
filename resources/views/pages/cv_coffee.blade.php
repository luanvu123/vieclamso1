<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Maker Chuyên Nghiệp</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .editor-section {
            padding: 30px;
            background: #fcfcfc;
            max-height: 100vh;
            overflow-y: auto;
        }

        .preview-section {
            background: white;
            padding: 0;
            position: relative;
        }

        .section-title {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 600;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: transform 0.2s ease;
            margin: 5px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
        }

        .dynamic-section {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #667eea;
        }

        .file-input-container {
            position: relative;
            display: inline-block;
            cursor: pointer;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            transition: transform 0.2s ease;
        }

        .file-input-container:hover {
            transform: translateY(-2px);
        }

        .file-input-container input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        /* CV Preview Styles */
        .cv-preview {
            padding: 40px;
            background: white;
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            min-height: 100vh;
        }

        .cv-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #2c3e50;
        }

        .cv-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #2c3e50;
            margin-right: 30px;
        }

        .cv-personal-info h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .cv-personal-info h2 {
            font-size: 1.2rem;
            color: #7f8c8d;
            font-weight: 400;
            margin-bottom: 15px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .contact-info span {
            color: #34495e;
            font-size: 0.9rem;
        }

        .cv-section {
            margin-bottom: 30px;
        }

        .cv-section h3 {
            font-size: 1.4rem;
            color: #2c3e50;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #3498db;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .experience-item, .education-item, .project-item {
            margin-bottom: 20px;
            padding-left: 20px;
            border-left: 3px solid #3498db;
            position: relative;
        }

        .experience-item::before, .education-item::before, .project-item::before {
            content: '';
            position: absolute;
            left: -6px;
            top: 8px;
            width: 10px;
            height: 10px;
            background: #3498db;
            border-radius: 50%;
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }

        .item-title {
            font-weight: bold;
            color: #2c3e50;
            font-size: 1.1rem;
        }

        .item-company {
            color: #7f8c8d;
            font-style: italic;
        }

        .item-date {
            color: #95a5a6;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .item-description {
            color: #555;
            margin-top: 8px;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .skill-item {
            background: #ecf0f1;
            padding: 8px 16px;
            border-radius: 20px;
            text-align: center;
            color: #2c3e50;
            font-weight: 500;
        }

        .download-section {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        @media (max-width: 1200px) {
            .container {
                grid-template-columns: 1fr;
            }

            .download-section {
                position: relative;
                top: auto;
                right: auto;
                text-align: center;
                margin: 20px 0;
            }
        }

        @media print {
            body * {
                visibility: hidden;
            }
            .cv-preview, .cv-preview * {
                visibility: visible;
            }
            .cv-preview {
                position: absolute;
                left: 0;
                top: 0;
                width: 100% !important;
                height: auto !important;
                padding: 20px !important;
            }
        }
    </style>
</head>
<body>
    <div class="download-section">
        <button class="btn" onclick="downloadPDF()">📄 Tải xuống PDF</button>
        <button class="btn btn-secondary" onclick="printCV()">🖨️ In CV</button>
    </div>

    <div class="container">
        <div class="editor-section">
            <h2 class="section-title">📝 Chỉnh sửa thông tin CV</h2>

            <!-- Thông tin cá nhân -->
            <div class="form-group">
                <label>Ảnh đại diện:</label>
                <div class="file-input-container">
                    <input type="file" id="photo" accept="image/*" onchange="handlePhotoUpload(event)">
                    📷 Chọn ảnh
                </div>
            </div>

            <div class="form-group">
                <label>Họ và tên:</label>
                <input type="text" id="fullName" placeholder="Nguyễn Văn A" oninput="updateCV()">
            </div>

            <div class="form-group">
                <label>Chức danh mong muốn:</label>
                <input type="text" id="jobTitle" placeholder="Frontend Developer" oninput="updateCV()">
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" id="email" placeholder="email@example.com" oninput="updateCV()">
            </div>

            <div class="form-group">
                <label>Số điện thoại:</label>
                <input type="tel" id="phone" placeholder="0123456789" oninput="updateCV()">
            </div>

            <div class="form-group">
                <label>Địa chỉ:</label>
                <input type="text" id="address" placeholder="123 Đường ABC, Quận XYZ, TP.HCM" oninput="updateCV()">
            </div>

            <div class="form-group">
                <label>Giới thiệu bản thân:</label>
                <textarea id="summary" placeholder="Mô tả ngắn gọn về bản thân và mục tiêu nghề nghiệp..." oninput="updateCV()"></textarea>
            </div>

            <!-- Kinh nghiệm làm việc -->
            <h3 class="section-title">💼 Kinh nghiệm làm việc</h3>
            <div id="experienceContainer"></div>
            <button class="btn btn-secondary" onclick="addExperience()">+ Thêm kinh nghiệm</button>

            <!-- Học vấn -->
            <h3 class="section-title">🎓 Học vấn</h3>
            <div id="educationContainer"></div>
            <button class="btn btn-secondary" onclick="addEducation()">+ Thêm học vấn</button>

            <!-- Dự án -->
            <h3 class="section-title">🚀 Dự án</h3>
            <div id="projectContainer"></div>
            <button class="btn btn-secondary" onclick="addProject()">+ Thêm dự án</button>

            <!-- Kỹ năng -->
            <h3 class="section-title">⚡ Kỹ năng</h3>
            <div class="form-group">
                <label>Kỹ năng (phân cách bằng dấu phẩy):</label>
                <textarea id="skills" placeholder="JavaScript, React, Node.js, Python, SQL..." oninput="updateCV()"></textarea>
            </div>
        </div>

        <div class="preview-section">
            <div class="cv-preview" id="cvPreview">
                <div class="cv-header">
                    <img id="previewPhoto" class="cv-photo" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120' viewBox='0 0 120 120'%3E%3Crect width='120' height='120' fill='%23e1e5e9'/%3E%3Ctext x='60' y='60' text-anchor='middle' dy='0.3em' font-size='14' fill='%23999'%3EẢnh%3C/text%3E%3C/svg%3E" alt="Ảnh đại diện">
                    <div class="cv-personal-info">
                        <h1 id="previewName">Họ và tên</h1>
                        <h2 id="previewJobTitle">Chức danh mong muốn</h2>
                        <div class="contact-info">
                            <span id="previewEmail">📧 email@example.com</span>
                            <span id="previewPhone">📱 0123456789</span>
                            <span id="previewAddress">📍 Địa chỉ</span>
                        </div>
                    </div>
                </div>

                <div class="cv-section" id="summarySection">
                    <h3>Giới thiệu</h3>
                    <p id="previewSummary">Mô tả ngắn gọn về bản thân và mục tiêu nghề nghiệp...</p>
                </div>

                <div class="cv-section" id="experienceSection">
                    <h3>Kinh nghiệm làm việc</h3>
                    <div id="previewExperience"></div>
                </div>

                <div class="cv-section" id="educationSection">
                    <h3>Học vấn</h3>
                    <div id="previewEducation"></div>
                </div>

                <div class="cv-section" id="projectSection">
                    <h3>Dự án</h3>
                    <div id="previewProject"></div>
                </div>

                <div class="cv-section" id="skillsSection">
                    <h3>Kỹ năng</h3>
                    <div class="skills-grid" id="previewSkills"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data storage
        let cvData = {
            experiences: [],
            education: [],
            projects: [],
            photo: null
        };

        // Initialize CV with sample data
        function initializeCV() {
            // Load from session storage if available
            const savedData = sessionStorage.getItem('cvData');
            if (savedData) {
                cvData = JSON.parse(savedData);
                loadDataToForm();
            } else {
                // Add sample data
                addExperience();
                addEducation();
                addProject();
            }
            updateCV();
        }

        function saveToSession() {
            sessionStorage.setItem('cvData', JSON.stringify(cvData));
        }

        function loadDataToForm() {
            // Load basic info
            document.getElementById('fullName').value = cvData.fullName || '';
            document.getElementById('jobTitle').value = cvData.jobTitle || '';
            document.getElementById('email').value = cvData.email || '';
            document.getElementById('phone').value = cvData.phone || '';
            document.getElementById('address').value = cvData.address || '';
            document.getElementById('summary').value = cvData.summary || '';
            document.getElementById('skills').value = cvData.skills || '';

            // Load photo
            if (cvData.photo) {
                document.getElementById('previewPhoto').src = cvData.photo;
            }

            // Load experiences
            cvData.experiences.forEach((exp, index) => {
                addExperience();
                const container = document.getElementById('experienceContainer');
                const lastItem = container.children[container.children.length - 1];
                lastItem.querySelector('.exp-title').value = exp.title || '';
                lastItem.querySelector('.exp-company').value = exp.company || '';
                lastItem.querySelector('.exp-duration').value = exp.duration || '';
                lastItem.querySelector('.exp-description').value = exp.description || '';
            });

            // Load education
            cvData.education.forEach((edu, index) => {
                addEducation();
                const container = document.getElementById('educationContainer');
                const lastItem = container.children[container.children.length - 1];
                lastItem.querySelector('.edu-degree').value = edu.degree || '';
                lastItem.querySelector('.edu-school').value = edu.school || '';
                lastItem.querySelector('.edu-duration').value = edu.duration || '';
                lastItem.querySelector('.edu-description').value = edu.description || '';
            });

            // Load projects
            cvData.projects.forEach((project, index) => {
                addProject();
                const container = document.getElementById('projectContainer');
                const lastItem = container.children[container.children.length - 1];
                lastItem.querySelector('.proj-title').value = project.title || '';
                lastItem.querySelector('.proj-tech').value = project.tech || '';
                lastItem.querySelector('.proj-duration').value = project.duration || '';
                lastItem.querySelector('.proj-description').value = project.description || '';
            });
        }

        function handlePhotoUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    cvData.photo = e.target.result;
                    document.getElementById('previewPhoto').src = e.target.result;
                    saveToSession();
                };
                reader.readAsDataURL(file);
            }
        }

        function addExperience() {
            const experienceHtml = `
                <div class="dynamic-section">
                    <div class="form-group">
                        <label>Chức danh:</label>
                        <input type="text" class="exp-title" placeholder="Frontend Developer" oninput="updateCV()">
                    </div>
                    <div class="form-group">
                        <label>Công ty:</label>
                        <input type="text" class="exp-company" placeholder="Công ty ABC" oninput="updateCV()">
                    </div>
                    <div class="form-group">
                        <label>Thời gian:</label>
                        <input type="text" class="exp-duration" placeholder="01/2020 - 12/2022" oninput="updateCV()">
                    </div>
                    <div class="form-group">
                        <label>Mô tả công việc:</label>
                        <textarea class="exp-description" placeholder="Mô tả chi tiết về công việc và thành tích..." oninput="updateCV()"></textarea>
                    </div>
                    <button class="btn btn-danger" onclick="removeSection(this, 'experiences')">Xóa</button>
                </div>
            `;
            document.getElementById('experienceContainer').insertAdjacentHTML('beforeend', experienceHtml);
        }

        function addEducation() {
            const educationHtml = `
                <div class="dynamic-section">
                    <div class="form-group">
                        <label>Bằng cấp:</label>
                        <input type="text" class="edu-degree" placeholder="Cử nhân Công nghệ thông tin" oninput="updateCV()">
                    </div>
                    <div class="form-group">
                        <label>Trường học:</label>
                        <input type="text" class="edu-school" placeholder="Đại học Bách Khoa" oninput="updateCV()">
                    </div>
                    <div class="form-group">
                        <label>Thời gian:</label>
                        <input type="text" class="edu-duration" placeholder="2016 - 2020" oninput="updateCV()">
                    </div>
                    <div class="form-group">
                        <label>Mô tả:</label>
                        <textarea class="edu-description" placeholder="GPA: 3.5/4.0, Tốt nghiệp loại Khá..." oninput="updateCV()"></textarea>
                    </div>
                    <button class="btn btn-danger" onclick="removeSection(this, 'education')">Xóa</button>
                </div>
            `;
            document.getElementById('educationContainer').insertAdjacentHTML('beforeend', educationHtml);
        }

        function addProject() {
            const projectHtml = `
                <div class="dynamic-section">
                    <div class="form-group">
                        <label>Tên dự án:</label>
                        <input type="text" class="proj-title" placeholder="Website thương mại điện tử" oninput="updateCV()">
                    </div>
                    <div class="form-group">
                        <label>Công nghệ sử dụng:</label>
                        <input type="text" class="proj-tech" placeholder="React, Node.js, MongoDB" oninput="updateCV()">
                    </div>
                    <div class="form-group">
                        <label>Thời gian thực hiện:</label>
                        <input type="text" class="proj-duration" placeholder="3 tháng" oninput="updateCV()">
                    </div>
                    <div class="form-group">
                        <label>Mô tả dự án:</label>
                        <textarea class="proj-description" placeholder="Mô tả chi tiết về dự án và vai trò của bạn..." oninput="updateCV()"></textarea>
                    </div>
                    <button class="btn btn-danger" onclick="removeSection(this, 'projects')">Xóa</button>
                </div>
            `;
            document.getElementById('projectContainer').insertAdjacentHTML('beforeend', projectHtml);
        }

        function removeSection(button, dataType) {
            button.parentElement.remove();
            updateCV();
        }

        function updateCV() {
            // Update basic info
            cvData.fullName = document.getElementById('fullName').value;
            cvData.jobTitle = document.getElementById('jobTitle').value;
            cvData.email = document.getElementById('email').value;
            cvData.phone = document.getElementById('phone').value;
            cvData.address = document.getElementById('address').value;
            cvData.summary = document.getElementById('summary').value;
            cvData.skills = document.getElementById('skills').value;

            // Update preview
            document.getElementById('previewName').textContent = cvData.fullName || 'Họ và tên';
            document.getElementById('previewJobTitle').textContent = cvData.jobTitle || 'Chức danh mong muốn';
            document.getElementById('previewEmail').textContent = '📧 ' + (cvData.email || 'email@example.com');
            document.getElementById('previewPhone').textContent = '📱 ' + (cvData.phone || '0123456789');
            document.getElementById('previewAddress').textContent = '📍 ' + (cvData.address || 'Địa chỉ');
            document.getElementById('previewSummary').textContent = cvData.summary || 'Mô tả ngắn gọn về bản thân và mục tiêu nghề nghiệp...';

            // Update experiences
            updateExperiences();
            updateEducation();
            updateProjects();
            updateSkills();

            // Save to session
            saveToSession();
        }

        function updateExperiences() {
            const experienceItems = document.querySelectorAll('#experienceContainer .dynamic-section');
            const previewContainer = document.getElementById('previewExperience');
            previewContainer.innerHTML = '';
            cvData.experiences = [];

            experienceItems.forEach(item => {
                const title = item.querySelector('.exp-title').value;
                const company = item.querySelector('.exp-company').value;
                const duration = item.querySelector('.exp-duration').value;
                const description = item.querySelector('.exp-description').value;

                cvData.experiences.push({ title, company, duration, description });

                if (title || company) {
                    const expHtml = `
                        <div class="experience-item">
                            <div class="item-header">
                                <div>
                                    <div class="item-title">${title || 'Chức danh'}</div>
                                    <div class="item-company">${company || 'Công ty'}</div>
                                </div>
                                <div class="item-date">${duration || 'Thời gian'}</div>
                            </div>
                            <div class="item-description">${description || ''}</div>
                        </div>
                    `;
                    previewContainer.insertAdjacentHTML('beforeend', expHtml);
                }
            });
        }

        function updateEducation() {
            const educationItems = document.querySelectorAll('#educationContainer .dynamic-section');
            const previewContainer = document.getElementById('previewEducation');
            previewContainer.innerHTML = '';
            cvData.education = [];

            educationItems.forEach(item => {
                const degree = item.querySelector('.edu-degree').value;
                const school = item.querySelector('.edu-school').value;
                const duration = item.querySelector('.edu-duration').value;
                const description = item.querySelector('.edu-description').value;

                cvData.education.push({ degree, school, duration, description });

                if (degree || school) {
                    const eduHtml = `
                        <div class="education-item">
                            <div class="item-header">
                                <div>
                                    <div class="item-title">${degree || 'Bằng cấp'}</div>
                                    <div class="item-company">${school || 'Trường học'}</div>
                                </div>
                                <div class="item-date">${duration || 'Thời gian'}</div>
                            </div>
                            <div class="item-description">${description || ''}</div>
                        </div>
                    `;
                    previewContainer.insertAdjacentHTML('beforeend', eduHtml);
                }
            });
        }

        function updateProjects() {
            const projectItems = document.querySelectorAll('#projectContainer .dynamic-section');
            const previewContainer = document.getElementById('previewProject');
            previewContainer.innerHTML = '';
            cvData.projects = [];

            projectItems.forEach(item => {
                const title = item.querySelector('.proj-title').value;
                const tech = item.querySelector('.proj-tech').value;
                const duration = item.querySelector('.proj-duration').value;
                const description = item.querySelector('.proj-description').value;

                cvData.projects.push({ title, tech, duration, description });

                if (title) {
                    const projHtml = `
                        <div class="project-item">
                            <div class="item-header">
                                <div>
                                    <div class="item-title">${title}</div>
                                    <div class="item-company">${tech || 'Công nghệ sử dụng'}</div>
                                </div>
                                <div class="item-date">${duration || 'Thời gian'}</div>
                            </div>
                            <div class="item-description">${description || ''}</div>
                        </div>
                    `;
                    previewContainer.insertAdjacentHTML('beforeend', projHtml);
                }
            });
        }

        function updateSkills() {
            const skillsText = document.getElementById('skills').value;
            const previewContainer = document.getElementById('previewSkills');
            previewContainer.innerHTML = '';

            if (skillsText) {
                const skills = skillsText.split(',').map(skill => skill.trim()).filter(skill => skill);
                skills.forEach(skill => {
                    const skillHtml = `<div class="skill-item">${skill}</div>`;
                    previewContainer.insertAdjacentHTML('beforeend', skillHtml);
                });
            }
        }

        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const element = document.getElementById('cvPreview');

            html2canvas(element, {
                scale: 2,
                useCORS: true,
                allowTaint: true,
                height: element.scrollHeight,
                width: element.scrollWidth
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');

                const imgWidth = 210;
                const pageHeight = 295;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;
                let heightLeft = imgHeight;
                let position = 0;

                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                const fileName = (cvData.fullName || 'CV') + '_CV.pdf';
                pdf.save(fileName);
            });
        }

        function printCV() {
            window.print();
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            initializeCV();
        });
    </script>
</body>
</html>
