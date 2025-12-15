// Données de l'application
class QuizApp {
    constructor() {
        this.currentUser = null;
        this.currentRole = null;
        this.initializeApp();
    }

    initializeApp() {
        this.loadData();
        this.setupEventListeners();
        this.checkAuth();
        this.updateUI();
    }

    // Charger les données depuis localStorage
    loadData() {
        const savedData = localStorage.getItem('quizAppData');
        if (savedData) {
            const data = JSON.parse(savedData);
            this.professors = data.professors || [];
            this.students = data.students || [];
            this.quizzes = data.quizzes || [];
            this.results = data.results || [];
        } else {
            // Données initiales
            this.professors = [
                { id: 1, name: "Dr. Martin", email: "martin@example.com", password: "prof123", specialty: "informatique" }
            ];
            this.students = [
                { id: 1, name: "Jean Dupont", email: "jean.dupont@example.com", group: "groupe1", level: "licence2", password: "etu123" },
                { id: 2, name: "Marie Curie", email: "marie123", group: "groupe2", level: "licence3", password: "etu456" }
            ];
            this.quizzes = [
                {
                    id: 1,
                    title: "Introduction à HTML",
                    module: "programmation",
                    duration: 30,
                    group: "groupe1",
                    description: "Quiz sur les bases du HTML",
                    questions: [
                        {
                            id: 1,
                            text: "Que signifie HTML ?",
                            answers: [
                                { text: "Hyper Text Markup Language", correct: true },
                                { text: "High Tech Modern Language", correct: false },
                                { text: "Home Tool Markup Language", correct: false }
                            ]
                        }
                    ],
                    createdBy: 1,
                    active: true
                }
            ];
            this.results = [
                {
                    id: 1,
                    studentId: 1,
                    quizId: 1,
                    score: 90,
                    date: "2023-09-10",
                    answers: [
                        { questionId: 1, answerIndex: 0, correct: true }
                    ]
                }
            ];
            
            this.saveData();
        }
    }

    // Sauvegarder les données dans localStorage
    saveData() {
        const data = {
            professors: this.professors,
            students: this.students,
            quizzes: this.quizzes,
            results: this.results
        };
        localStorage.setItem('quizAppData', JSON.stringify(data));
    }

    // Vérifier l'authentification
    checkAuth() {
        const userData = localStorage.getItem('currentUser');
        if (userData) {
            const user = JSON.parse(userData);
            this.currentUser = user;
            this.currentRole = user.role;
            this.redirectToDashboard();
        }
    }

    // Rediriger vers le tableau de bord approprié
    redirectToDashboard() {
        if (window.location.pathname.includes('login.html') || 
            window.location.pathname.includes('index.html')) {
            if (this.currentRole === 'professor') {
                window.location.href = 'professor.html';
            } else if (this.currentRole === 'student') {
                window.location.href = 'student.html';
            }
        }
    }

    // Configuration des écouteurs d'événements
    setupEventListeners() {
        // Gestion des onglets de connexion/inscription
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        
        if (loginTab && registerTab) {
            loginTab.addEventListener('click', () => this.switchAuthTab('login'));
            registerTab.addEventListener('click', () => this.switchAuthTab('register'));
        }

        // Sélection du rôle dans l'authentification
        document.querySelectorAll('.role-option').forEach(option => {
            option.addEventListener('click', (e) => this.selectRoleOption(e.target));
        });

        // Formulaire de connexion
        const loginForm = document.getElementById('loginFormData');
        if (loginForm) {
            loginForm.addEventListener('submit', (e) => this.handleLogin(e));
        }

        // Formulaires d'inscription
        const profRegisterForm = document.getElementById('registerProfessorForm');
        if (profRegisterForm) {
            profRegisterForm.addEventListener('submit', (e) => this.handleProfessorRegister(e));
        }

        const studentRegisterForm = document.getElementById('registerStudentForm');
        if (studentRegisterForm) {
            studentRegisterForm.addEventListener('submit', (e) => this.handleStudentRegister(e));
        }

        // Navigation dans les applications
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => this.handleNavigation(e));
        });

        // Boutons de création de quiz
        const addQuizBtn = document.getElementById('addNewQuiz');
        if (addQuizBtn) {
            addQuizBtn.addEventListener('click', () => this.showCreateQuiz());
        }

        // Formulaire de quiz
        const quizForm = document.getElementById('quizForm');
        if (quizForm) {
            quizForm.addEventListener('submit', (e) => this.handleQuizForm(e));
        }

        // Bouton d'ajout de question
        const addQuestionBtn = document.getElementById('addQuestionBtn');
        if (addQuestionBtn) {
            addQuestionBtn.addEventListener('click', () => this.addQuestion());
        }

        // Bouton d'ajout d'étudiant
        const addStudentBtn = document.getElementById('addStudentBtn');
        if (addStudentBtn) {
            addStudentBtn.addEventListener('click', () => this.showStudentModal());
        }

        // Fermeture des modals
        document.querySelectorAll('.close-modal').forEach(btn => {
            btn.addEventListener('click', () => this.closeModal());
        });

        // Déconnexion
        const logoutLinks = document.querySelectorAll('[href*="index.html"]');
        logoutLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                if (link.getAttribute('href').includes('index.html')) {
                    e.preventDefault();
                    this.logout();
                }
            });
        });
    }

    // Changer d'onglet d'authentification
    switchAuthTab(tab) {
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        if (tab === 'login') {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            loginForm.classList.add('active');
            registerForm.classList.remove('active');
        } else {
            loginTab.classList.remove('active');
            registerTab.classList.add('active');
            loginForm.classList.remove('active');
            registerForm.classList.add('active');
        }
    }

    // Sélectionner un rôle dans l'authentification
    selectRoleOption(target) {
        const roleOption = target.closest('.role-option');
        const role = roleOption.dataset.role;
        
        // Mettre à jour les options de rôle
        document.querySelectorAll('.role-option').forEach(opt => {
            opt.classList.remove('active');
        });
        roleOption.classList.add('active');

        // Mettre à jour les formulaires
        if (role === 'professor') {
            document.getElementById('registerProfessorForm').classList.add('active');
            document.getElementById('registerStudentForm').classList.remove('active');
            document.getElementById('loginRole').value = 'professor';
            document.getElementById('registerRole').value = 'professor';
        } else {
            document.getElementById('registerProfessorForm').classList.remove('active');
            document.getElementById('registerStudentForm').classList.add('active');
            document.getElementById('loginRole').value = 'student';
            document.getElementById('registerRole').value = 'student';
        }
    }

    // Gérer la connexion
    handleLogin(e) {
        e.preventDefault();
        
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;
        const role = document.getElementById('loginRole').value;

        let user = null;
        
        if (role === 'professor') {
            user = this.professors.find(p => p.email === email && p.password === password);
        } else {
            user = this.students.find(s => s.email === email && s.password === password);
        }

        if (user) {
            this.currentUser = { ...user, role };
            this.currentRole = role;
            
            // Sauvegarder l'utilisateur connecté
            localStorage.setItem('currentUser', JSON.stringify(this.currentUser));
            
            // Rediriger vers le tableau de bord
            this.redirectToDashboard();
        } else {
            alert('Identifiants incorrects. Veuillez réessayer.');
        }
    }

    // Gérer l'inscription d'un professeur
    handleProfessorRegister(e) {
        e.preventDefault();
        
        const name = document.getElementById('profName').value;
        const email = document.getElementById('profEmail').value;
        const specialty = document.getElementById('profSpecialty').value;
        const password = document.getElementById('profPassword').value;
        const confirmPassword = document.getElementById('profConfirmPassword').value;

        // Validation
        if (password !== confirmPassword) {
            alert('Les mots de passe ne correspondent pas.');
            return;
        }

        if (this.professors.some(p => p.email === email)) {
            alert('Un professeur avec cet email existe déjà.');
            return;
        }

        // Créer le nouveau professeur
        const newProfessor = {
            id: this.professors.length + 1,
            name,
            email,
            specialty,
            password
        };

        this.professors.push(newProfessor);
        this.saveData();

        alert('Inscription réussie ! Vous pouvez maintenant vous connecter.');
        this.switchAuthTab('login');
    }

    // Gérer l'inscription d'un étudiant
    handleStudentRegister(e) {
        e.preventDefault();
        
        const name = document.getElementById('studentName').value;
        const email = document.getElementById('studentEmail').value;
        const group = document.getElementById('studentGroup').value;
        const level = document.getElementById('studentNiveau').value;
        const password = document.getElementById('studentPassword').value;
        const confirmPassword = document.getElementById('studentConfirmPassword').value;

        // Validation
        if (password !== confirmPassword) {
            alert('Les mots de passe ne correspondent pas.');
            return;
        }

        if (this.students.some(s => s.email === email)) {
            alert('Un étudiant avec cet email existe déjà.');
            return;
        }

        // Créer le nouvel étudiant
        const newStudent = {
            id: this.students.length + 1,
            name,
            email,
            group,
            level,
            password
        };

        this.students.push(newStudent);
        this.saveData();

        alert('Inscription réussie ! Vous pouvez maintenant vous connecter.');
        this.switchAuthTab('login');
    }

    // Gérer la navigation dans l'application
    handleNavigation(e) {
        e.preventDefault();
        const link = e.target.closest('.nav-link');
        const sectionId = link.dataset.section;

        // Mettre à jour les liens actifs
        document.querySelectorAll('.nav-link').forEach(l => {
            l.classList.remove('active');
        });
        link.classList.add('active');

        // Afficher la section correspondante
        this.showSection(sectionId);
    }

    // Afficher une section spécifique
    showSection(sectionId) {
        // Cacher toutes les sections
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.remove('active');
        });

        // Afficher la section demandée
        const targetSection = document.getElementById(sectionId);
        if (targetSection) {
            targetSection.classList.add('active');

            // Charger les données spécifiques à la section
            switch(sectionId) {
                case 'dashboard':
                case 'studentDashboard':
                    this.loadDashboard();
                    break;
                case 'quizzes':
                    this.loadQuizzes();
                    break;
                case 'availableQuizzes':
                    this.loadAvailableQuizzes();
                    break;
                case 'students':
                    this.loadStudents();
                    break;
                case 'results':
                case 'myResults':
                    this.loadResults();
                    break;
            }
        }
    }

    // Charger le tableau de bord
    loadDashboard() {
        if (this.currentRole === 'professor') {
            this.loadProfessorDashboard();
        } else {
            this.loadStudentDashboard();
        }
    }

    // Charger le tableau de bord du professeur
    loadProfessorDashboard() {
        // Mettre à jour les statistiques
        document.getElementById('totalQuizzes').textContent = 
            this.quizzes.filter(q => q.createdBy === this.currentUser.id).length;
        
        document.getElementById('totalStudents').textContent = this.students.length;
        
        // Calculer le score moyen
        const professorResults = this.results.filter(r => 
            this.quizzes.some(q => q.id === r.quizId && q.createdBy === this.currentUser.id)
        );
        const avgScore = professorResults.length > 0 ? 
            Math.round(professorResults.reduce((sum, r) => sum + r.score, 0) / professorResults.length) : 0;
        document.getElementById('averageScore').textContent = avgScore + '%';
        
        document.getElementById('activeQuizzes').textContent = 
            this.quizzes.filter(q => q.createdBy === this.currentUser.id && q.active).length;

        // Charger les quiz récents
        this.loadRecentQuizzes();
        this.loadRecentActivity();
        this.loadTopStudents();
    }

    // Charger le tableau de bord de l'étudiant
    loadStudentDashboard() {
        const studentId = this.currentUser.id;
        const studentResults = this.results.filter(r => r.studentId === studentId);
        
        // Mettre à jour les statistiques
        document.getElementById('availableQuizzesCount').textContent = 
            this.quizzes.filter(q => (q.group === this.currentUser.group || q.group === 'tous') && q.active).length;
        
        document.getElementById('completedQuizzesCount').textContent = studentResults.length;
        
        const avgScore = studentResults.length > 0 ? 
            Math.round(studentResults.reduce((sum, r) => sum + r.score, 0) / studentResults.length) : 0;
        document.getElementById('myAverageScore').textContent = avgScore + '%';

        // Calculer le classement
        const allStudents = this.students.map(student => {
            const scores = this.results.filter(r => r.studentId === student.id);
            const avg = scores.length > 0 ? 
                scores.reduce((sum, r) => sum + r.score, 0) / scores.length : 0;
            return { id: student.id, avgScore: avg };
        }).sort((a, b) => b.avgScore - a.avgScore);
        
        const rank = allStudents.findIndex(s => s.id === studentId) + 1;
        document.getElementById('rankingPosition').textContent = rank > 0 ? rank + 'ème' : '-';

        // Charger les données spécifiques
        this.loadPendingQuizzes();
        this.loadStudentActivity();
        this.loadBestScores();
    }

    // Charger les quiz
    loadQuizzes() {
        const tableBody = document.getElementById('quizzesTable');
        if (!tableBody) return;

        const professorQuizzes = this.quizzes.filter(q => q.createdBy === this.currentUser.id);
        
        tableBody.innerHTML = professorQuizzes.map(quiz => `
            <tr>
                <td>${quiz.title}</td>
                <td>${this.getModuleName(quiz.module)}</td>
                <td>${quiz.duration} min</td>
                <td>${quiz.questions.length}</td>
                <td>${this.getParticipantsCount(quiz.id)}</td>
                <td><span class="status ${quiz.active ? 'active' : 'inactive'}">
                    ${quiz.active ? 'Actif' : 'Inactif'}
                </span></td>
                <td>
                    <button class="btn-action edit" onclick="app.editQuiz(${quiz.id})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn-action delete" onclick="app.deleteQuiz(${quiz.id})">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `).join('');
    }

    // Afficher le formulaire de création de quiz
    showCreateQuiz(quizId = null) {
        this.showSection('createQuiz');
        
        if (quizId) {
            // Mode édition
            const quiz = this.quizzes.find(q => q.id === quizId);
            if (quiz) {
                this.fillQuizForm(quiz);
            }
        } else {
            // Mode création
            this.resetQuizForm();
        }
    }

    // Ajouter une question au formulaire
    addQuestion() {
        const container = document.getElementById('questionsContainer');
        const questionId = Date.now();
        
        const questionHTML = `
            <div class="question-item" data-id="${questionId}">
                <div class="question-header">
                    <h4>Question</h4>
                    <button type="button" class="btn-remove" onclick="app.removeQuestion(${questionId})">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control question-text" 
                           placeholder="Texte de la question" required>
                </div>
                <div class="answers">
                    <div class="answer-option">
                        <input type="radio" name="correct-${questionId}" value="0" required>
                        <input type="text" class="form-control answer-text" 
                               placeholder="Réponse 1" required>
                    </div>
                    <div class="answer-option">
                        <input type="radio" name="correct-${questionId}" value="1">
                        <input type="text" class="form-control answer-text" 
                               placeholder="Réponse 2" required>
                    </div>
                    <div class="answer-option">
                        <input type="radio" name="correct-${questionId}" value="2">
                        <input type="text" class="form-control answer-text" 
                               placeholder="Réponse 3" required>
                    </div>
                    <div class="answer-option">
                        <input type="radio" name="correct-${questionId}" value="2">
                        <input type="text" class="form-control answer-text" 
                               placeholder="Réponse 4" required>
                    </div>
                </div>
            </div>
        `;
        
        container.insertAdjacentHTML('beforeend', questionHTML);
    }

    // Supprimer une question
    removeQuestion(questionId) {
        const questionElement = document.querySelector(`[data-id="${questionId}"]`);
        if (questionElement) {
            questionElement.remove();
        }
    }

    // Gérer le formulaire de quiz
    handleQuizForm(e) {
        e.preventDefault();
        
        const quizId = document.getElementById('quizId').value;
        const title = document.getElementById('quizTitle').value;
        const module = document.getElementById('quizModule').value;
        const duration = document.getElementById('quizDuration').value;
        const group = document.getElementById('quizGroup').value;
        const description = document.getElementById('quizDescription').value;

        // Récupérer les questions
        const questions = [];
        const questionElements = document.querySelectorAll('.question-item');
        
        questionElements.forEach((element, index) => {
            const questionText = element.querySelector('.question-text').value;
            const answerElements = element.querySelectorAll('.answer-text');
            const correctAnswer = element.querySelector('input[type="radio"]:checked').value;
            
            const answers = Array.from(answerElements).map((input, idx) => ({
                text: input.value,
                correct: idx === parseInt(correctAnswer)
            }));

            questions.push({
                id: index + 1,
                text: questionText,
                answers: answers
            });
        });

        if (quizId) {
            // Mode édition
            const index = this.quizzes.findIndex(q => q.id === parseInt(quizId));
            if (index !== -1) {
                this.quizzes[index] = {
                    ...this.quizzes[index],
                    title,
                    module,
                    duration: parseInt(duration),
                    group,
                    description,
                    questions
                };
            }
        } else {
            // Mode création
            const newQuiz = {
                id: this.quizzes.length + 1,
                title,
                module,
                duration: parseInt(duration),
                group,
                description,
                questions,
                createdBy: this.currentUser.id,
                active: true,
                createdAt: new Date().toISOString()
            };
            
            this.quizzes.push(newQuiz);
        }

        this.saveData();
        alert(quizId ? 'Quiz modifié avec succès !' : 'Quiz créé avec succès !');
        this.showSection('quizzes');
        this.loadQuizzes();
    }

    // Charger les étudiants
    loadStudents() {
        const tableBody = document.getElementById('studentsTable');
        if (!tableBody) return;

        tableBody.innerHTML = this.students.map(student => {
            const studentResults = this.results.filter(r => r.studentId === student.id);
            const avgScore = studentResults.length > 0 ?
                Math.round(studentResults.reduce((sum, r) => sum + r.score, 0) / studentResults.length) : 0;
            
            return `
                <tr>
                    <td>${student.name}</td>
                    <td>${student.email}</td>
                    <td>${this.getGroupName(student.group)}</td>
                    <td>${studentResults.length}</td>
                    <td>${avgScore}%</td>
                    <td>
                        <button class="btn-action-view" onclick="app.viewStudent(${student.id})">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
            `;
        }).join('');
    }

    // Afficher le modal d'ajout d'étudiant
    showStudentModal() {
        // Implémentation du modal d'étudiant
        console.log('Afficher modal étudiant');
    }

    // Charger les résultats
    loadResults() {
        const tableBody = this.currentRole === 'professor' ? 
            document.getElementById('resultsTable') : 
            document.getElementById('myResultsTable');
        
        if (!tableBody) return;

        let results = [];
        
        if (this.currentRole === 'professor') {
            // Récupérer les résultats des quiz du professeur
            const professorQuizIds = this.quizzes
                .filter(q => q.createdBy === this.currentUser.id)
                .map(q => q.id);
            
            results = this.results.filter(r => professorQuizIds.includes(r.quizId));
        } else {
            // Récupérer les résultats de l'étudiant
            results = this.results.filter(r => r.studentId === this.currentUser.id);
        }

        tableBody.innerHTML = results.map(result => {
            const quiz = this.quizzes.find(q => q.id === result.quizId);
            const student = this.students.find(s => s.id === result.studentId);
            
            return `
                <tr>
                    <td>${this.currentRole === 'professor' ? student?.name || 'Inconnu' : quiz?.title || 'Quiz inconnu'}</td>
                    <td>${this.currentRole === 'professor' ? quiz?.title || 'Quiz inconnu' : this.getModuleName(quiz?.module) || '-'}</td>
                    <td><strong>${result.score}%</strong></td>
                    <td>${result.date}</td>
                    <td>${result.time || 'N/A'}</td>
                    <td>
                        <button class="btn-action view" onclick="app.viewResultDetails(${result.id})">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
            `;
        }).join('');
    }

    // Charger les quiz disponibles pour les étudiants
    loadAvailableQuizzes() {
        const container = document.getElementById('availableQuizzesList');
        if (!container) return;

        const studentGroup = this.currentUser.group;
        const availableQuizzes = this.quizzes.filter(q => 
            q.active && (q.group === studentGroup || q.group === 'tous')
        );

        container.innerHTML = availableQuizzes.map(quiz => {
            const alreadyTaken = this.results.some(r => 
                r.quizId === quiz.id && r.studentId === this.currentUser.id
            );

            return `
                <div class="quiz-card">
                    <h4>${quiz.title}</h4>
                    <p>${quiz.description || 'Aucune description'}</p>
                    <div class="quiz-meta">
                        <span><i class="fas fa-book"></i> ${this.getModuleName(quiz.module)}</span>
                        <span><i class="fas fa-clock"></i> ${quiz.duration} min</span>
                        <span><i class="fas fa-question-circle"></i> ${quiz.questions.length} questions</span>
                    </div>
                    <div class="quiz-actions">
                        ${alreadyTaken ? 
                            `<button class="btn btn-secondary" disabled>
                                <i class="fas fa-check"></i> Déjà passé
                            </button>` :
                            `<button class="btn btn-primary" onclick="app.takeQuiz(${quiz.id})">
                                <i class="fas fa-play"></i> Commencer
                            </button>`
                        }
                        <button class="btn btn-secondary" onclick="app.viewQuizDetails(${quiz.id})">
                            <i class="fas fa-info-circle"></i> Détails
                        </button>
                    </div>
                </div>
            `;
        }).join('');
    }

    // Passer un quiz
    takeQuiz(quizId) {
        const quiz = this.quizzes.find(q => q.id === quizId);
        if (!quiz) return;

        // Implémentation de la logique pour passer un quiz
        console.log('Passer le quiz:', quiz.title);
        // Cette fonction devrait ouvrir un modal avec le quiz
    }

    // Fermer un modal
    closeModal() {
        document.querySelectorAll('.modal').forEach(modal => {
            modal.classList.remove('active');
        });
    }

    // Déconnexion
    logout() {
        this.currentUser = null;
        this.currentRole = null;
        localStorage.removeItem('currentUser');
        window.location.href = 'index.html';
    }

    // Méthodes utilitaires
    getModuleName(moduleCode) {
        const modules = {
            'programmation': 'Programmation Web',
            'bdd': 'Bases de données',
            'algo': 'Algorithmique',
            'reseaux': 'Réseaux'
        };
        return modules[moduleCode] || moduleCode;
    }

    getGroupName(groupCode) {
        const groups = {
            'groupe1': 'Groupe 1',
            'groupe2': 'Groupe 2',
            'groupe3': 'Groupe 3',
            'tous': 'Tous les groupes'
        };
        return groups[groupCode] || groupCode;
    }

    getParticipantsCount(quizId) {
        return this.results.filter(r => r.quizId === quizId).length;
    }

    // Méthodes pour charger les données spécifiques (à implémenter)
    loadRecentQuizzes() {
        // Implémentation
    }

    loadRecentActivity() {
        // Implémentation
    }

    loadTopStudents() {
        // Implémentation
    }

    loadPendingQuizzes() {
        // Implémentation
    }

    loadStudentActivity() {
        // Implémentation
    }

    loadBestScores() {
        // Implémentation
    }

    // Mettre à jour l'interface utilisateur
    updateUI() {
        // Mettre à jour le nom de l'utilisateur connecté
        if (this.currentUser) {
            const userNameElements = document.querySelectorAll('.user-name, #professorName, #studentName');
            userNameElements.forEach(element => {
                if (element.id === 'professorName' && this.currentRole === 'professor') {
                    element.textContent = this.currentUser.name;
                } else if (element.id === 'studentName' && this.currentRole === 'student') {
                    element.textContent = this.currentUser.name;
                } else if (element.classList.contains('user-name')) {
                    element.textContent = this.currentUser.name;
                }
            });

            // Mettre à jour le message de bienvenue
            const welcomeMsg = document.getElementById('welcomeMessage') || 
                               document.getElementById('studentWelcome');
            if (welcomeMsg) {
                welcomeMsg.textContent = `Bienvenue, ${this.currentUser.name}`;
            }
        }
    }
}

// Initialiser l'application
const app = new QuizApp();

// Exposer l'application globalement pour les événements onclick
window.app = app;