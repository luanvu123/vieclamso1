@extends('layouts.app')

@section('content')


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            color: white;
            padding: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card.green {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }

        .stat-card.orange {
            background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%);
        }

        .stat-card.purple {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stat-card.blue {
            background: linear-gradient(135deg, #2196F3 0%, #21CBF3 100%);
        }

        .stat-card.red {
            background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 100%);
        }

        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .growth-indicator {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            margin-top: 0.5rem;
        }

        .growth-positive {
            background-color: rgba(34, 197, 94, 0.1);
            color: #16a34a;
        }

        .growth-negative {
            background-color: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }
    </style>


    <div class="container-fluid">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1 class="mb-2">📊 Dashboard Analytics</h1>
            <p class="mb-0">Tổng quan hoạt động hệ thống tuyển dụng</p>
        </div>

        <!-- Key Metrics Row -->
        <div class="row mb-4">
            <div class="col-md-2 mb-3">
                <div class="stat-card blue">
                    <h3>{{ $totalHomeVisitors }}</h3>
                    <p class="mb-1">Vieclamso1</p>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="stat-card green">
                    <h3> {{ $totalRecruitmentVisitors }}</h3>
                    <p class="mb-1">Tuyendungso1</p>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="stat-card orange">
                    <h3>{{ $onlineHomeVisitors }}</h3>
                    <p class="mb-1">Online Vieclamso1</p>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="stat-card purple">
                    <h3>{{ $onlineRecruitmentVisitors }}</h3>
                    <p class="mb-1">Online Tuyendungso1</p>

                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="stat-card red">
                    <h3>{{ number_format($totalSupport) }}</h3>
                    <p class="mb-1">Hỗ trợ</p>
                    <small>Yêu cầu hỗ trợ</small>
                </div>
            </div>

        </div>

        <!-- Charts Row 1 -->
        <div class="row mb-4">
            <!-- Monthly Growth Chart -->
            <div class="col-lg-8">
                <div class="chart-container">
                    <h5 class="mb-3">📈 Xu hướng tăng trưởng theo tháng</h5>
                    <canvas id="monthlyGrowthChart" height="100"></canvas>
                </div>
            </div>

            <!-- Application Status Pie Chart -->
            <div class="col-lg-4">
                <div class="chart-container">
                    <h5 class="mb-3">🎯 Trạng thái đơn ứng tuyển</h5>
                    <canvas id="applicationStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Charts Row 2 -->
        <div class="row mb-4">
            <!-- Job Categories -->
            <div class="col-lg-6">
                <div class="chart-container">
                    <h5 class="mb-3">💼 Top danh mục công việc</h5>
                    <canvas id="jobCategoriesChart" height="120"></canvas>
                </div>
            </div>

            <!-- Job Locations -->
            <div class="col-lg-6">
                <div class="chart-container">
                    <h5 class="mb-3">🌍 Phân bố theo địa điểm</h5>
                    <canvas id="jobLocationsChart" height="120"></canvas>
                </div>
            </div>
        </div>

        <!-- Charts Row 3 -->
        <div class="row mb-4">
            <!-- Daily Applications -->
            <div class="col-lg-6">
                <div class="chart-container">
                    <h5 class="mb-3">📊 Đơn ứng tuyển 7 ngày qua</h5>
                    <canvas id="dailyApplicationsChart" height="120"></canvas>
                </div>
            </div>

            <!-- Gender Distribution -->
            <div class="col-lg-3">
                <div class="chart-container">
                    <h5 class="mb-3">👥 Phân bố giới tính</h5>
                    <canvas id="genderChart"></canvas>
                </div>
            </div>

            <!-- Support Status -->
            <div class="col-lg-3">
                <div class="chart-container">
                    <h5 class="mb-3">🎧 Trạng thái hỗ trợ</h5>
                    <canvas id="supportStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Charts Row 4 -->
        <div class="row mb-4">
            <!-- Experience Levels -->
            <div class="col-lg-8">
                <div class="chart-container">
                    <h5 class="mb-3">🎓 Yêu cầu kinh nghiệm</h5>
                    <canvas id="experienceLevelsChart" height="100"></canvas>
                </div>
            </div>

            <!-- Order Status -->
            <div class="col-lg-4">
                <div class="chart-container">
                    <h5 class="mb-3">🛒 Trạng thái đơn hàng</h5>
                    <canvas id="orderStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Top Skills & Salary Range -->
        <div class="row">
            <div class="col-lg-6">
                <div class="chart-container">
                    <h5 class="mb-3">⭐ Top kỹ năng được yêu cầu</h5>
                    <canvas id="topSkillsChart" height="150"></canvas>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="chart-container">
                    <h5 class="mb-3">💰 Phân bố mức lương</h5>
                    <canvas id="salaryRangesChart" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Chart configurations and colors
        const colors = {
            primary: '#667eea',
            secondary: '#764ba2',
            success: '#38ef7d',
            warning: '#f7b733',
            danger: '#fc4a1a',
            info: '#21CBF3',
            purple: '#9C27B0',
            orange: '#FF9800',
            teal: '#009688'
        };

        const chartColors = [
            '#667eea', '#38ef7d', '#fc4a1a', '#f7b733', '#21CBF3',
            '#9C27B0', '#FF9800', '#009688', '#E91E63', '#795548'
        ];

        // Monthly Growth Chart
        const monthlyGrowthCtx = document.getElementById('monthlyGrowthChart').getContext('2d');
        new Chart(monthlyGrowthCtx, {
            type: 'line',
            data: {
                labels: @json($monthlyData->pluck('month')),
                datasets: [{
                    label: 'Ứng viên',
                    data: @json($monthlyData->pluck('candidates')),
                    borderColor: colors.primary,
                    backgroundColor: colors.primary + '20',
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Việc làm',
                    data: @json($monthlyData->pluck('job_postings')),
                    borderColor: colors.success,
                    backgroundColor: colors.success + '20',
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Đơn ứng tuyển',
                    data: @json($monthlyData->pluck('applications')),
                    borderColor: colors.warning,
                    backgroundColor: colors.warning + '20',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Application Status Pie Chart
        @if($applicationStatus->count() > 0)
            const applicationStatusCtx = document.getElementById('applicationStatusChart').getContext('2d');
            new Chart(applicationStatusCtx, {
                type: 'doughnut',
                data: {
                    labels: @json($applicationStatus->pluck('status')),
                    datasets: [{
                        data: @json($applicationStatus->pluck('total')),
                        backgroundColor: chartColors.slice(0, {{ $applicationStatus->count() }})
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        @endif

            // Job Categories Bar Chart
            @if($jobCategories->count() > 0)
                const jobCategoriesCtx = document.getElementById('jobCategoriesChart').getContext('2d');
                new Chart(jobCategoriesCtx, {
                    type: 'bar',
                    data: {
                        labels: @json($jobCategories->pluck('category')),
                        datasets: [{
                            label: 'Số lượng việc làm',
                            data: @json($jobCategories->pluck('total')),
                            backgroundColor: colors.primary,
                            borderRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            @endif

        // Job Locations Horizontal Bar Chart
        const jobLocationsCtx = document.getElementById('jobLocationsChart').getContext('2d');
        new Chart(jobLocationsCtx, {
            type: 'bar',
            data: {
                labels: @json($jobLocations->pluck('city')),
                datasets: [{
                    label: 'Số lượng việc làm',
                    data: @json($jobLocations->pluck('total')),
                    backgroundColor: colors.success,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Daily Applications Area Chart
        const dailyApplicationsCtx = document.getElementById('dailyApplicationsChart').getContext('2d');
        new Chart(dailyApplicationsCtx, {
            type: 'line',
            data: {
                labels: @json($dailyApplications->pluck('date')),
                datasets: [{
                    label: 'Đơn ứng tuyển hàng ngày',
                    data: @json($dailyApplications->pluck('applications')),
                    borderColor: colors.info,
                    backgroundColor: colors.info + '30',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: colors.info,
                    pointBorderWidth: 2,
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gender Distribution Pie Chart
        @if($candidateGender->count() > 0)
            const genderCtx = document.getElementById('genderChart').getContext('2d');
            new Chart(genderCtx, {
                type: 'pie',
                data: {
                    labels: @json($candidateGender->pluck('gender')),
                    datasets: [{
                        data: @json($candidateGender->pluck('total')),
                        backgroundColor: [colors.info, colors.danger, colors.warning]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        @endif

        // Support Status Doughnut Chart
        const supportStatusCtx = document.getElementById('supportStatusChart').getContext('2d');
        new Chart(supportStatusCtx, {
            type: 'doughnut',
            data: {
                labels: @json($supportStatus->pluck('status')),
                datasets: [{
                    data: @json($supportStatus->pluck('total')),
                    backgroundColor: chartColors.slice(0, @json($supportStatus->count()))
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Experience Levels Radar Chart
        const experienceLevelsCtx = document.getElementById('experienceLevelsChart').getContext('2d');
        new Chart(experienceLevelsCtx, {
            type: 'polarArea',
            data: {
                labels: @json($experienceLevels->pluck('experience')),
                datasets: [{
                    data: @json($experienceLevels->pluck('total')),
                    backgroundColor: chartColors.map(color => color + '80'),
                    borderColor: chartColors,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });

        // Order Status Chart
        const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
        new Chart(orderStatusCtx, {
            type: 'doughnut',
            data: {
                labels: @json($orderStatus->pluck('status')),
                datasets: [{
                    data: @json($orderStatus->pluck('total')),
                    backgroundColor: chartColors.slice(0, @json($orderStatus->count()))
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Top Skills Horizontal Bar Chart
        @if($topSkills->count() > 0)
            const topSkillsCtx = document.getElementById('topSkillsChart').getContext('2d');
            new Chart(topSkillsCtx, {
                type: 'bar',
                data: {
                    labels: @json($topSkills->pluck('skill')),
                    datasets: [{
                        label: 'Số lần yêu cầu',
                        data: @json($topSkills->pluck('count')),
                        backgroundColor: colors.purple,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        @endif

        // Salary Ranges Chart
        const salaryRangesCtx = document.getElementById('salaryRangesChart').getContext('2d');
        new Chart(salaryRangesCtx, {
            type: 'bar',
            data: {
                labels: @json($salaryRanges->pluck('salary')),
                datasets: [{
                    label: 'Số lượng việc làm',
                    data: @json($salaryRanges->pluck('total')),
                    backgroundColor: colors.orange,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
