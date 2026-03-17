@extends('layouts.app')
@section('title', 'Master Setup Dashboard - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Master Setup Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div>
            <button class="btn btn-secondary me-2">
                <i class="fas fa-download me-2"></i>Export Report
            </button>
            <button class="btn btn-primary">
                <i class="fas fa-sync me-2"></i>Refresh Data
            </button>
        </div>
    </div>
</div>

<!-- Overview Stats -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-database"></i>
            </div>
            <div class="stats-content">
                <h3>6</h3>
                <p>Master Modules</p>
                <small class="text-success"><i class="fas fa-check-circle"></i> All Active</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stats-content">
                <h3>98.5%</h3>
                <p>System Health</p>
                <small class="text-success"><i class="fas fa-arrow-up"></i> +2.3%</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stats-content">
                <h3>8</h3>
                <p>Pending Actions</p>
                <small class="text-warning"><i class="fas fa-clock"></i> Requires Attention</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-danger">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stats-content">
                <h3>12</h3>
                <p>Due Maintenance</p>
                <small class="text-danger"><i class="fas fa-arrow-down"></i> This Week</small>
            </div>
        </div>
    </div>
</div>

<!-- Module Status Cards -->
<div class="row mb-4">
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card module-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1">Products</h6>
                        <small class="text-muted">Inventory Management</small>
                    </div>
                    <div class="module-icon">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
                <div class="module-stats">
                    <div class="stat-item">
                        <span>Total:</span>
                        <strong>24</strong>
                    </div>
                    <div class="stat-item">
                        <span>Active:</span>
                        <strong class="text-success">18</strong>
                    </div>
                    <div class="stat-item">
                        <span>Low Stock:</span>
                        <strong class="text-warning">3</strong>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 75%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <small class="text-muted">75% Active</small>
                    <a href="{{ route('master.product.index') }}" class="text-primary"><small>View Details →</small></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card module-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1">Pricing</h6>
                        <small class="text-muted">Price Management</small>
                    </div>
                    <div class="module-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
                <div class="module-stats">
                    <div class="stat-item">
                        <span>Total Rules:</span>
                        <strong>12</strong>
                    </div>
                    <div class="stat-item">
                        <span>Active:</span>
                        <strong class="text-success">8</strong>
                    </div>
                    <div class="stat-item">
                        <span>Scheduled:</span>
                        <strong class="text-warning">2</strong>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 67%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <small class="text-muted">67% Active</small>
                    <a href="{{ route('master.pricing.index') }}" class="text-primary"><small>View Details →</small></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card module-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1">Fuel Tanks</h6>
                        <small class="text-muted">Storage Management</small>
                    </div>
                    <div class="module-icon">
                        <i class="fas fa-oil-can"></i>
                    </div>
                </div>
                <div class="module-stats">
                    <div class="stat-item">
                        <span>Total Tanks:</span>
                        <strong>8</strong>
                    </div>
                    <div class="stat-item">
                        <span>Capacity:</span>
                        <strong class="text-success">45,000L</strong>
                    </div>
                    <div class="stat-item">
                        <span>Current:</span>
                        <strong class="text-warning">32,500L</strong>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 72%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <small class="text-muted">72% Filled</small>
                    <a href="{{ route('master.tank.index') }}" class="text-primary"><small>View Details →</small></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card module-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1">Dispensers</h6>
                        <small class="text-muted">Pump Management</small>
                    </div>
                    <div class="module-icon">
                        <i class="fas fa-pump-soap"></i>
                    </div>
                </div>
                <div class="module-stats">
                    <div class="stat-item">
                        <span>Total:</span>
                        <strong>16</strong>
                    </div>
                    <div class="stat-item">
                        <span>Active:</span>
                        <strong class="text-success">14</strong>
                    </div>
                    <div class="stat-item">
                        <span>Maintenance:</span>
                        <strong class="text-danger">1</strong>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 88%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <small class="text-muted">88% Operational</small>
                    <a href="{{ route('master.dispenser.index') }}" class="text-primary"><small>View Details →</small></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card module-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1">Nozzles</h6>
                        <small class="text-muted">Nozzle Management</small>
                    </div>
                    <div class="module-icon">
                        <i class="fas fa-spray-can"></i>
                    </div>
                </div>
                <div class="module-stats">
                    <div class="stat-item">
                        <span>Total:</span>
                        <strong>48</strong>
                    </div>
                    <div class="stat-item">
                        <span>Active:</span>
                        <strong class="text-success">42</strong>
                    </div>
                    <div class="stat-item">
                        <span>Calibration Due:</span>
                        <strong class="text-warning">4</strong>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 88%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <small class="text-muted">88% Active</small>
                    <a href="{{ route('master.nozzle.index') }}" class="text-primary"><small>View Details →</small></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card module-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1">Meter Readings</h6>
                        <small class="text-muted">Reading Management</small>
                    </div>
                    <div class="module-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                </div>
                <div class="module-stats">
                    <div class="stat-item">
                        <span>Total:</span>
                        <strong>156</strong>
                    </div>
                    <div class="stat-item">
                        <span>Today:</span>
                        <strong class="text-success">48</strong>
                    </div>
                    <div class="stat-item">
                        <span>Discrepancies:</span>
                        <strong class="text-danger">3</strong>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 94%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <small class="text-muted">94% Verified</small>
                    <a href="{{ route('master.meter.index') }}" class="text-primary"><small>View Details →</small></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Analytics Section -->
<div class="row mb-4">
    <!-- Fuel Output by Nozzle -->
    <div class="col-xl-8 mb-3">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Fuel Output by Nozzle (Last 7 Days)</h5>
                    <select class="form-select" style="width: auto;" id="nozzleFilter">
                        <option>All Nozzles</option>
                        <option>Top 5</option>
                        <option>Bottom 5</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <canvas id="fuelOutputChart" height="80"></canvas>
            </div>
        </div>
    </div>

    <!-- Product Sales Distribution -->
    <div class="col-xl-4 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Product Sales Distribution</h5>
            </div>
            <div class="card-body">
                <canvas id="productSalesChart" height="200"></canvas>
                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted"><i class="fas fa-circle" style="color: #0B3C5D;"></i> Petrol</span>
                        <strong>45%</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted"><i class="fas fa-circle" style="color: #2ECC71;"></i> Diesel</span>
                        <strong>35%</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted"><i class="fas fa-circle" style="color: #F39C12;"></i> Premium</span>
                        <strong>15%</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted"><i class="fas fa-circle" style="color: #E74C3C;"></i> Others</span>
                        <strong>5%</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- More Analytics -->
<div class="row mb-4">
    <!-- Tank Capacity Utilization -->
    <div class="col-xl-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-oil-can me-2"></i>Tank Capacity Utilization</h5>
            </div>
            <div class="card-body">
                <canvas id="tankCapacityChart" height="120"></canvas>
            </div>
        </div>
    </div>

    <!-- Dispenser Performance -->
    <div class="col-xl-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-pump-soap me-2"></i>Dispenser Performance (This Month)</h5>
            </div>
            <div class="card-body">
                <canvas id="dispenserPerformanceChart" height="120"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Top Performers & Trends -->
<div class="row mb-4">
    <!-- Top Performing Nozzles -->
    <div class="col-xl-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-trophy me-2"></i>Top Performing Nozzles</h5>
            </div>
            <div class="card-body">
                <div class="top-performer-item">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rank-badge gold">1</div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Nozzle N1-A</h6>
                            <small class="text-muted">Dispenser D1 - Petrol</small>
                        </div>
                        <div class="text-end">
                            <strong>8,450 L</strong>
                            <small class="text-success d-block">+12%</small>
                        </div>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" style="width: 95%"></div>
                    </div>
                </div>
                <div class="top-performer-item">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rank-badge silver">2</div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Nozzle N2-A</h6>
                            <small class="text-muted">Dispenser D2 - Diesel</small>
                        </div>
                        <div class="text-end">
                            <strong>7,820 L</strong>
                            <small class="text-success d-block">+8%</small>
                        </div>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" style="width: 88%"></div>
                    </div>
                </div>
                <div class="top-performer-item">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rank-badge bronze">3</div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Nozzle N1-B</h6>
                            <small class="text-muted">Dispenser D1 - Petrol</small>
                        </div>
                        <div class="text-end">
                            <strong>7,340 L</strong>
                            <small class="text-success d-block">+5%</small>
                        </div>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" style="width: 82%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daily Trends -->
    <div class="col-xl-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Daily Fuel Dispensed Trend</h5>
            </div>
            <div class="card-body">
                <canvas id="dailyTrendChart" height="120"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Analytics Section -->
<div class="row mb-4">
    <!-- Maintenance Schedule -->
    <div class="col-xl-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Upcoming Maintenance</h5>
            </div>
            <div class="card-body">
                <div class="maintenance-item">
                    <div class="d-flex align-items-center">
                        <div class="maintenance-icon bg-warning">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Dispenser D3 - Calibration</h6>
                            <small class="text-muted">Zone B - Bay 1</small>
                        </div>
                        <div class="text-end">
                            <span class="badge-status scheduled">Tomorrow</span>
                        </div>
                    </div>
                </div>
                <div class="maintenance-item">
                    <div class="d-flex align-items-center">
                        <div class="maintenance-icon bg-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Tank A2 - Inspection</h6>
                            <small class="text-muted">Diesel Tank</small>
                        </div>
                        <div class="text-end">
                            <span class="badge-status expired">Overdue</span>
                        </div>
                    </div>
                </div>
                <div class="maintenance-item">
                    <div class="d-flex align-items-center">
                        <div class="maintenance-icon bg-primary">
                            <i class="fas fa-spray-can"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Nozzle N2-A - Replacement</h6>
                            <small class="text-muted">Dispenser D2</small>
                        </div>
                        <div class="text-end">
                            <span class="badge-status active">In 3 Days</span>
                        </div>
                    </div>
                </div>
                <div class="maintenance-item">
                    <div class="d-flex align-items-center">
                        <div class="maintenance-icon bg-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Meter Calibration - All Nozzles</h6>
                            <small class="text-muted">Monthly Schedule</small>
                        </div>
                        <div class="text-end">
                            <span class="badge-status active">In 5 Days</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="col-xl-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-history me-2"></i>Recent Activities</h5>
            </div>
            <div class="card-body">
                <div class="activity-item">
                    <div class="activity-icon bg-success">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="activity-content">
                        <h6 class="mb-0">New Product Added</h6>
                        <small class="text-muted">Engine Oil 10W-40 added to inventory</small>
                        <small class="text-muted d-block">2 hours ago</small>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon bg-primary">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="activity-content">
                        <h6 class="mb-0">Pricing Updated</h6>
                        <small class="text-muted">Petrol price changed to ₹95.50/L</small>
                        <small class="text-muted d-block">4 hours ago</small>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon bg-warning">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="activity-content">
                        <h6 class="mb-0">Maintenance Completed</h6>
                        <small class="text-muted">Dispenser D1 serviced successfully</small>
                        <small class="text-muted d-block">Yesterday</small>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon bg-info">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <div class="activity-content">
                        <h6 class="mb-0">Meter Reading Recorded</h6>
                        <small class="text-muted">48 readings verified for today</small>
                        <small class="text-muted d-block">Yesterday</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions & Alerts -->
<div class="row">
    <!-- Quick Actions -->
    <div class="col-xl-4 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('master.product.create') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-box me-2"></i>Add New Product
                    </a>
                    <a href="{{ route('master.pricing.create') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-tags me-2"></i>Update Pricing
                    </a>
                    <a href="{{ route('master.meter.create') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-tachometer-alt me-2"></i>Record Reading
                    </a>
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-file-export me-2"></i>Generate Report
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- System Alerts -->
    <div class="col-xl-8 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bell me-2"></i>System Alerts</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-warning mb-2">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Low Stock Alert:</strong> 3 products are running low on stock. <a href="{{ route('master.product.index') }}" class="alert-link">View Details</a>
                </div>
                <div class="alert alert-danger mb-2">
                    <i class="fas fa-tools me-2"></i>
                    <strong>Maintenance Overdue:</strong> Tank A2 inspection is overdue by 2 days. <a href="{{ route('master.tank.index') }}" class="alert-link">Schedule Now</a>
                </div>
                <div class="alert alert-info mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Calibration Reminder:</strong> 4 nozzles require calibration this week. <a href="{{ route('master.nozzle.index') }}" class="alert-link">View Schedule</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.module-card {
    border: 1px solid var(--tracko-border);
    transition: all 0.3s ease;
}

.module-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
}

.module-icon {
    width: 48px;
    height: 48px;
    border-radius: 10px;
    background: linear-gradient(135deg, rgba(11, 60, 93, 0.1) 0%, rgba(46, 204, 113, 0.1) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--tracko-primary);
    font-size: 20px;
}

.module-stats {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.stat-item {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
}

.stat-item span {
    color: var(--tracko-text-light);
}

.maintenance-item {
    padding: 16px;
    border-bottom: 1px solid var(--tracko-border);
}

.maintenance-item:last-child {
    border-bottom: none;
}

.maintenance-icon {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-right: 12px;
}

.activity-item {
    display: flex;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid var(--tracko-border);
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
}

.activity-content h6 {
    font-size: 13px;
    margin-bottom: 4px;
}

.activity-content small {
    font-size: 11px;
}

.top-performer-item {
    padding: 16px;
    border-radius: 8px;
    background: var(--tracko-light);
    margin-bottom: 12px;
}

.top-performer-item:last-child {
    margin-bottom: 0;
}

.rank-badge {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: white;
    margin-right: 12px;
    font-size: 14px;
}

.rank-badge.gold {
    background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
}

.rank-badge.silver {
    background: linear-gradient(135deg, #C0C0C0 0%, #808080 100%);
}

.rank-badge.bronze {
    background: linear-gradient(135deg, #CD7F32 0%, #8B4513 100%);
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fuel Output by Nozzle Chart
    const fuelOutputCtx = document.getElementById('fuelOutputChart').getContext('2d');
    new Chart(fuelOutputCtx, {
        type: 'bar',
        data: {
            labels: ['N1-A', 'N1-B', 'N2-A', 'N2-B', 'N3-A', 'N3-B', 'N4-A', 'N4-B'],
            datasets: [{
                label: 'Fuel Dispensed (Liters)',
                data: [8450, 7340, 7820, 6890, 5420, 6120, 7650, 6980],
                backgroundColor: 'rgba(11, 60, 93, 0.8)',
                borderColor: 'rgba(11, 60, 93, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString() + 'L';
                        }
                    }
                }
            }
        }
    });

    // Product Sales Distribution Chart
    const productSalesCtx = document.getElementById('productSalesChart').getContext('2d');
    new Chart(productSalesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Petrol', 'Diesel', 'Premium', 'Others'],
            datasets: [{
                data: [45, 35, 15, 5],
                backgroundColor: [
                    'rgba(11, 60, 93, 0.8)',
                    'rgba(46, 204, 113, 0.8)',
                    'rgba(243, 156, 18, 0.8)',
                    'rgba(231, 76, 60, 0.8)'
                ],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    // Tank Capacity Utilization Chart
    const tankCapacityCtx = document.getElementById('tankCapacityChart').getContext('2d');
    new Chart(tankCapacityCtx, {
        type: 'bar',
        data: {
            labels: ['Tank A1', 'Tank A2', 'Tank B1', 'Tank B2', 'Tank C1', 'Tank C2', 'Tank D1', 'Tank D2'],
            datasets: [
                {
                    label: 'Current Stock',
                    data: [7500, 2100, 3200, 4800, 5600, 3900, 2800, 2600],
                    backgroundColor: 'rgba(46, 204, 113, 0.8)'
                },
                {
                    label: 'Available Capacity',
                    data: [2500, 5900, 1800, 1200, 400, 2100, 3200, 3400],
                    backgroundColor: 'rgba(149, 165, 166, 0.3)'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                x: { stacked: true },
                y: { 
                    stacked: true,
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString() + 'L';
                        }
                    }
                }
            }
        }
    });

    // Dispenser Performance Chart
    const dispenserPerformanceCtx = document.getElementById('dispenserPerformanceChart').getContext('2d');
    new Chart(dispenserPerformanceCtx, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [
                {
                    label: 'Dispenser D1',
                    data: [15800, 16200, 15900, 16500],
                    borderColor: 'rgba(11, 60, 93, 1)',
                    backgroundColor: 'rgba(11, 60, 93, 0.1)',
                    tension: 0.4
                },
                {
                    label: 'Dispenser D2',
                    data: [14700, 15100, 14800, 15400],
                    borderColor: 'rgba(46, 204, 113, 1)',
                    backgroundColor: 'rgba(46, 204, 113, 0.1)',
                    tension: 0.4
                },
                {
                    label: 'Dispenser D3',
                    data: [11200, 11800, 11500, 12100],
                    borderColor: 'rgba(243, 156, 18, 1)',
                    backgroundColor: 'rgba(243, 156, 18, 0.1)',
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { position: 'bottom' }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString() + 'L';
                        }
                    }
                }
            }
        }
    });

    // Daily Trend Chart
    const dailyTrendCtx = document.getElementById('dailyTrendChart').getContext('2d');
    new Chart(dailyTrendCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Total Dispensed',
                data: [12450, 13200, 11800, 14500, 15200, 16800, 14200],
                borderColor: 'rgba(11, 60, 93, 1)',
                backgroundColor: 'rgba(11, 60, 93, 0.1)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString() + 'L';
                        }
                    }
                }
            }
        }
    });
});
</script>
@endpush
@endsection
