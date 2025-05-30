<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Thiên Nhiên</title>
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
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .editor-panel {
            flex: 1;
            min-width: 300px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .cv-preview {
            flex: 1;
            min-width: 400px;
        }

        .cv-container {
            background: linear-gradient(135deg, #e8f5e8 0%, #f0f8f0 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .cv-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 150px;
            background: linear-gradient(135deg, #4CAF50 0%, #2E7D32 100%);
            z-index: 1;
        }

        .cv-header {
            position: relative;
            z-index: 2;
            padding: 40px 30px 20px;
            text-align: center;
            color: white;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 20px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: #4CAF50;
            border: 4px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .cv-header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .cv-header p {
            font-size: 1.2em;
            opacity: 0.9;
        }

        .cv-body {
            padding: 30px;
            background: white;
            position: relative;
            z-index: 2;
        }

        .cv-section {
            margin-bottom: 30px;
        }

        .cv-section h2 {
            color: #2E7D32;
            font-size: 1.5em;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #4CAF50;
            position: relative;
        }

        .cv-section h2::after {
            content: '🌿';
            position: absolute;
            right: 0;
            top: -2px;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9em;
        }

        .experience-item, .project-item {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            border-left: 4px solid #4CAF50;
        }

        .experience-item h3, .project-item h3 {
            color: #2E7D32;
            margin-bottom: 5px;
        }

        .experience-item .company, .project-item .tech {
            color: #666;
            font-style: italic;
            margin-bottom: 10px;
        }

        .skills-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
        }

        .skill-item {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            text-align: center;
            font-size: 0.9em;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: white;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.9);
            font-size: 14px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .btn {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #FF7043, #D84315);
        }

        .btn-secondary:hover {
            box-shadow: 0 5px 15px rgba(255, 112, 67, 0.3);
        }

        .dynamic-list {
            margin-top: 10px;
        }

        .list-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .remove-btn {
            background: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }

        #imageInput {
            margin-bottom: 10px;
        }

        .image-preview {
            max-width: 100px;
            max-height: 100px;
            border-radius: 10px;
            margin-top: 10px;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .container {
                display: block;
            }

            .editor-panel {
                display: none;
            }

            .cv-preview {
                width: 100%;
                min-width: auto;
            }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .cv-header h1 {
                font-size: 2em;
            }

            .contact-info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Panel chỉnh sửa -->
        <div class="editor-panel">
            <h2 style="color: white; margin-bottom: 20px;">🌿 Chỉnh sửa CV</h2>

            <div class="form-group">
                <label>Ảnh đại diện:</label>
                <input type="file" id="imageInput" accept="image/*">
            </div>

            <div class="form-group">
                <label>Họ và tên:</label>
                <input type="text" id="fullName" placeholder="Nhập họ và tên">
            </div>

            <div class="form-group">
                <label>Chức danh:</label>
                <input type="text" id="jobTitle" placeholder="Vị trí mong muốn">
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" id="email" placeholder="email@example.com">
            </div>

            <div class="form-group">
                <label>Số điện thoại:</label>
                <input type="tel" id="phone" placeholder="0123456789">
            </div>

            <div class="form-group">
                <label>Địa chỉ:</label>
                <input type="text" id="address" placeholder="Địa chỉ của bạn">
            </div>

            <div class="form-group">
                <label>Giới thiệu bản thân:</label>
                <textarea id="summary" placeholder="Mô tả ngắn gọn về bản thân và mục tiêu nghề nghiệp..."></textarea>
            </div>

            <!-- Kinh nghiệm làm việc -->
            <div class="form-group">
                <label>Kinh nghiệm làm việc:</label>
                <input type="text" id="expPosition" placeholder="Vị trí">
                <input type="text" id="expCompany" placeholder="Công ty" style="margin-top: 5px;">
                <input type="text" id="expPeriod" placeholder="Thời gian (VD: 01/2023 - 07/2024)" style="margin-top: 5px;">
                <textarea id="expDescription" placeholder="Mô tả công việc..." style="margin-top: 5px;"></textarea>
                <button class="btn" onclick="addExperience()">Thêm kinh nghiệm</button>
                <div id="experienceList" class="dynamic-list"></div>
            </div>

            <!-- Dự án -->
            <div class="form-group">
                <label>Dự án:</label>
                <input type="text" id="projectName" placeholder="Tên dự án">
                <input type="text" id="projectTech" placeholder="Công nghệ sử dụng" style="margin-top: 5px;">
                <textarea id="projectDescription" placeholder="Mô tả dự án..." style="margin-top: 5px;"></textarea>
                <button class="btn" onclick="addProject()">Thêm dự án</button>
                <div id="projectList" class="dynamic-list"></div>
            </div>

            <!-- Kỹ năng -->
            <div class="form-group">
                <label>Kỹ năng:</label>
                <input type="text" id="skillName" placeholder="Tên kỹ năng">
                <button class="btn" onclick="addSkill()">Thêm kỹ năng</button>
                <div id="skillList" class="dynamic-list"></div>
            </div>

            <!-- Học vấn -->
            <div class="form-group">
                <label>Học vấn:</label>
                <input type="text" id="education" placeholder="Trường - Chuyên ngành - Năm tốt nghiệp">
                <button class="btn" onclick="addEducation()">Thêm học vấn</button>
                <div id="educationList" class="dynamic-list"></div>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <button class="btn" onclick="updatePreview()">🔄 Cập nhật CV</button>
                <button class="btn btn-secondary" onclick="downloadPDF()">📥 Tải PDF</button>
            </div>
        </div>

        <!-- Xem trước CV -->
        <div class="cv-preview">
            <div class="cv-container" id="cvContainer">
                <div class="cv-header">
                    <div class="profile-img" id="profileImg">👤</div>
                    <h1 id="displayName">Họ và Tên</h1>
                    <p id="displayTitle">Chức danh mong muốn</p>
                </div>

                <div class="cv-body">
                    <div class="cv-section">
                        <h2>Thông tin liên hệ</h2>
                        <div class="contact-info">
                            <div class="contact-item">
                                <span>📧</span>
                                <span id="displayEmail">email@example.com</span>
                            </div>
                            <div class="contact-item">
                                <span>📱</span>
                                <span id="displayPhone">0123456789</span>
                            </div>
                            <div class="contact-item">
                                <span>📍</span>
                                <span id="displayAddress">Địa chỉ</span>
                            </div>
                        </div>
                    </div>

                    <div class="cv-section">
                        <h2>Giới thiệu</h2>
                        <p id="displaySummary" style="line-height: 1.6; color: #555;">
                            Mô tả ngắn gọn về bản thân và mục tiêu nghề nghiệp của bạn sẽ hiển thị ở đây...
                        </p>
                    </div>

                    <div class="cv-section" id="experienceSection">
                        <h2>Kinh nghiệm làm việc</h2>
                        <div id="displayExperience"></div>
                    </div>

                    <div class="cv-section" id="projectSection">
                        <h2>Dự án</h2>
                        <div id="displayProjects"></div>
                    </div>

                    <div class="cv-section" id="skillSection">
                        <h2>Kỹ năng</h2>
                        <div id="displaySkills" class="skills-container"></div>
                    </div>

                    <div class="cv-section" id="educationSection">
                        <h2>Học vấn</h2>
                        <div id="displayEducation"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Dữ liệu tạm thời (thay thế cho sessionStorage)
        let cvData = {
            personal: {
                fullName: '',
                jobTitle: '',
                email: '',
                phone: '',
                address: '',
                summary: '',
                profileImage: null
            },
            experiences: [],
            projects: [],
            skills: [],
            education: []
        };

        // Xử lý upload ảnh
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    cvData.personal.profileImage = e.target.result;
                    updateProfileImage();
                };
                reader.readAsDataURL(file);
            }
        });

        function updateProfileImage() {
            const profileImg = document.getElementById('profileImg');
            if (cvData.personal.profileImage) {
                profileImg.innerHTML = `<img src="${cvData.personal.profileImage}" alt="Profile">`;
            } else {
                profileImg.innerHTML = '👤';
            }
        }

        function addExperience() {
            const position = document.getElementById('expPosition').value;
            const company = document.getElementById('expCompany').value;
            const period = document.getElementById('expPeriod').value;
            const description = document.getElementById('expDescription').value;

            if (position && company) {
                cvData.experiences.push({
                    position,
                    company,
                    period,
                    description
                });

                // Xóa form
                document.getElementById('expPosition').value = '';
                document.getElementById('expCompany').value = '';
                document.getElementById('expPeriod').value = '';
                document.getElementById('expDescription').value = '';

                updateExperienceList();
                updatePreview();
            }
        }

        function addProject() {
            const name = document.getElementById('projectName').value;
            const tech = document.getElementById('projectTech').value;
            const description = document.getElementById('projectDescription').value;

            if (name) {
                cvData.projects.push({
                    name,
                    tech,
                    description
                });

                // Xóa form
                document.getElementById('projectName').value = '';
                document.getElementById('projectTech').value = '';
                document.getElementById('projectDescription').value = '';

                updateProjectList();
                updatePreview();
            }
        }

        function addSkill() {
            const skill = document.getElementById('skillName').value;
            if (skill && !cvData.skills.includes(skill)) {
                cvData.skills.push(skill);
                document.getElementById('skillName').value = '';
                updateSkillList();
                updatePreview();
            }
        }

        function addEducation() {
            const edu = document.getElementById('education').value;
            if (edu) {
                cvData.education.push(edu);
                document.getElementById('education').value = '';
                updateEducationList();
                updatePreview();
            }
        }

        function updateExperienceList() {
            const list = document.getElementById('experienceList');
            list.innerHTML = '';
            cvData.experiences.forEach((exp, index) => {
                list.innerHTML += `
                    <div class="list-item">
                        <span>${exp.position} - ${exp.company}</span>
                        <button class="remove-btn" onclick="removeExperience(${index})">Xóa</button>
                    </div>
                `;
            });
        }

        function updateProjectList() {
            const list = document.getElementById('projectList');
            list.innerHTML = '';
            cvData.projects.forEach((project, index) => {
                list.innerHTML += `
                    <div class="list-item">
                        <span>${project.name}</span>
                        <button class="remove-btn" onclick="removeProject(${index})">Xóa</button>
                    </div>
                `;
            });
        }

        function updateSkillList() {
            const list = document.getElementById('skillList');
            list.innerHTML = '';
            cvData.skills.forEach((skill, index) => {
                list.innerHTML += `
                    <div class="list-item">
                        <span>${skill}</span>
                        <button class="remove-btn" onclick="removeSkill(${index})">Xóa</button>
                    </div>
                `;
            });
        }

        function updateEducationList() {
            const list = document.getElementById('educationList');
            list.innerHTML = '';
            cvData.education.forEach((edu, index) => {
                list.innerHTML += `
                    <div class="list-item">
                        <span>${edu}</span>
                        <button class="remove-btn" onclick="removeEducation(${index})">Xóa</button>
                    </div>
                `;
            });
        }

        function removeExperience(index) {
            cvData.experiences.splice(index, 1);
            updateExperienceList();
            updatePreview();
        }

        function removeProject(index) {
            cvData.projects.splice(index, 1);
            updateProjectList();
            updatePreview();
        }

        function removeSkill(index) {
            cvData.skills.splice(index, 1);
            updateSkillList();
            updatePreview();
        }

        function removeEducation(index) {
            cvData.education.splice(index, 1);
            updateEducationList();
            updatePreview();
        }

        function updatePreview() {
            // Cập nhật thông tin cá nhân
            cvData.personal.fullName = document.getElementById('fullName').value || 'Họ và Tên';
            cvData.personal.jobTitle = document.getElementById('jobTitle').value || 'Chức danh mong muốn';
            cvData.personal.email = document.getElementById('email').value || 'email@example.com';
            cvData.personal.phone = document.getElementById('phone').value || '0123456789';
            cvData.personal.address = document.getElementById('address').value || 'Địa chỉ';
            cvData.personal.summary = document.getElementById('summary').value || 'Mô tả ngắn gọn về bản thân và mục tiêu nghề nghiệp của bạn sẽ hiển thị ở đây...';

            // Cập nhật hiển thị
            document.getElementById('displayName').textContent = cvData.personal.fullName;
            document.getElementById('displayTitle').textContent = cvData.personal.jobTitle;
            document.getElementById('displayEmail').textContent = cvData.personal.email;
            document.getElementById('displayPhone').textContent = cvData.personal.phone;
            document.getElementById('displayAddress').textContent = cvData.personal.address;
            document.getElementById('displaySummary').textContent = cvData.personal.summary;

            // Cập nhật ảnh
            updateProfileImage();

            // Cập nhật kinh nghiệm
            const expDisplay = document.getElementById('displayExperience');
            expDisplay.innerHTML = '';
            cvData.experiences.forEach(exp => {
                expDisplay.innerHTML += `
                    <div class="experience-item">
                        <h3>${exp.position}</h3>
                        <div class="company">${exp.company} ${exp.period ? '• ' + exp.period : ''}</div>
                        <p>${exp.description}</p>
                    </div>
                `;
            });

            // Cập nhật dự án
            const projectDisplay = document.getElementById('displayProjects');
            projectDisplay.innerHTML = '';
            cvData.projects.forEach(project => {
                projectDisplay.innerHTML += `
                    <div class="project-item">
                        <h3>${project.name}</h3>
                        <div class="tech">${project.tech}</div>
                        <p>${project.description}</p>
                    </div>
                `;
            });

            // Cập nhật kỹ năng
            const skillDisplay = document.getElementById('displaySkills');
            skillDisplay.innerHTML = '';
            cvData.skills.forEach(skill => {
                skillDisplay.innerHTML += `<div class="skill-item">${skill}</div>`;
            });

            // Cập nhật học vấn
            const eduDisplay = document.getElementById('displayEducation');
            eduDisplay.innerHTML = '';
            cvData.education.forEach(edu => {
                eduDisplay.innerHTML += `<div style="margin-bottom: 10px; padding: 10px; background: #f8f9fa; border-radius: 8px;">${edu}</div>`;
            });

            // Ẩn/hiện các section trống
            document.getElementById('experienceSection').style.display = cvData.experiences.length ? 'block' : 'none';
            document.getElementById('projectSection').style.display = cvData.projects.length ? 'block' : 'none';
            document.getElementById('skillSection').style.display = cvData.skills.length ? 'block' : 'none';
            document.getElementById('educationSection').style.display = cvData.education.length ? 'block' : 'none';
        }

        async function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const element = document.getElementById('cvContainer');

            // Tạm thời ẩn editor panel
            const editorPanel = document.querySelector('.editor-panel');
            editorPanel.style.display = 'none';

            try {
                const canvas = await html2canvas(element, {
                    scale: 2,
                    useCORS: true,
                    allowTaint: true,
                    backgroundColor: '#ffffff'
                });

                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');

                const imgWidth = 210;
                const pageHeight = 297;
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

                pdf.save(`CV_${cvData.personal.fullName || 'CV'}.pdf`);
            } catch (error) {
                console.error('Lỗi khi tạo PDF:', error);
                alert('Có lỗi xảy ra khi tạo PDF. Vui lòng thử lại.');
            } finally {
                // Hiện lại editor panel
                editorPanel.style.display = 'block';
            }
        }

        // Khởi tạo
        updatePreview();
    </script>
</body>
</html>
