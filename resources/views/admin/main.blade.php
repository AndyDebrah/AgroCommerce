<div class="main-panel">
    <div class="content-wrapper">
        <style>
            .stats-container {
                display: flex;
                flex-wrap: wrap;
                gap: 1.5rem;
                padding: 1.5rem;
            }

            .stat-card {
                flex: 1;
                min-width: 280px;
                background: linear-gradient(145deg, #1e2024, #23272b);
                border-radius: 1rem;
                padding: 1.5rem;
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
                border: 1px solid rgba(255, 255, 255, 0.05);
            }

            .stat-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 6px;
                height: 100%;
                transition: all 0.3s ease;
            }

            .stat-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
            }

            .stat-card.products::before { background: #6366F1; }
            .stat-card.orders::before { background: #0EA5E9; }
            .stat-card.customers::before { background: #7C3AED; }
            .stat-card.revenue::before { background: #059669; }
            .stat-card.delivered::before { background: #34D399; }
            .stat-card.processing::before { background: #eab308; }

            .stat-content {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
            }

            .stat-info {
                flex-grow: 1;
            }

            .stat-value {
                font-size: 2rem;
                font-weight: bold;
                color: #fff;
                margin-bottom: 0.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .stat-label {
                color: #9CA3AF;
                font-size: 0.875rem;
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }

            .stat-icon {
                width: 3rem;
                height: 3rem;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 0.75rem;
                background: rgba(255, 255, 255, 0.1);
                transition: all 0.3s ease;
            }

            .stat-card:hover .stat-icon {
                transform: scale(1.1) rotate(5deg);
            }

            .stat-icon i {
                font-size: 1.5rem;
                color: #fff;
            }

            .trend-badge {
                padding: 0.25rem 0.75rem;
                border-radius: 9999px;
                font-size: 0.75rem;
                font-weight: 500;
                background: rgba(255, 255, 255, 0.1);
                color: #fff;
                display: inline-flex;
                align-items: center;
                gap: 0.25rem;
                margin-top: 0.5rem;
            }
        </style>

        <div class="stats-container">
            <!-- Products Card -->
            <div class="stat-card products">
                <div class="stat-content">
                    <div class="stat-info">
                        <div class="stat-value">
                            {{ $totalProducts }}
                            @if(isset($productPercentage))
                            <span class="trend-badge">
                                <i class="mdi mdi-trending-up"></i>
                                {{ $productPercentage }}%
                            </span>
                            @endif
                        </div>
                        <div class="stat-label">Total Products</div>
                    </div>
                    <div class="stat-icon">
                        <i class="mdi mdi-package-variant"></i>
                    </div>
                </div>
            </div>

            <!-- Orders Card -->
            <div class="stat-card orders">
                <div class="stat-content">
                    <div class="stat-info">
                        <div class="stat-value">
                            {{ $totalOrders }}
                            <span class="trend-badge">
                                <i class="mdi mdi-cart"></i>
                                Active
                            </span>
                        </div>
                        <div class="stat-label">Total Orders</div>
                    </div>
                    <div class="stat-icon">
                        <i class="mdi mdi-cart"></i>
                    </div>
                </div>
            </div>

            <!-- Customers Card -->
            <div class="stat-card customers">
                <div class="stat-content">
                    <div class="stat-info">
                        <div class="stat-value">{{ $totalUsers }}</div>
                        <div class="stat-label">Total Customers</div>
                    </div>
                    <div class="stat-icon">
                        <i class="mdi mdi-account-group"></i>
                    </div>
                </div>
            </div>

            <!-- Revenue Card -->
            <div class="stat-card revenue">
                <div class="stat-content">
                    <div class="stat-info">
                        <div class="stat-value">${{ number_format($totalRev, 2) }}</div>
                        <div class="stat-label">Total Revenue</div>
                    </div>
                    <div class="stat-icon">
                        <i class="mdi mdi-currency-usd"></i>
                    </div>
                </div>
            </div>

            <!-- Delivered Orders -->
            <div class="stat-card delivered">
                <div class="stat-content">
                    <div class="stat-info">
                        <div class="stat-value">
                            {{ $totalDelivered }}
                            @if($totalOrders > 0)
                            <span class="trend-badge">
                                <i class="mdi mdi-check-circle"></i>
                                {{ round(($totalDelivered / $totalOrders) * 100) }}%
                            </span>
                            @endif
                        </div>
                        <div class="stat-label">Orders Delivered</div>
                    </div>
                    <div class="stat-icon">
                        <i class="mdi mdi-check-circle"></i>
                    </div>
                </div>
            </div>

            <!-- Processing Orders -->
            <div class="stat-card processing">
                <div class="stat-content">
                    <div class="stat-info">
                        <div class="stat-value">
                            {{ $totalProcessing }}
                            @if($totalOrders > 0)
                            <span class="trend-badge">
                                <i class="mdi mdi-refresh"></i>
                                {{ round(($totalProcessing / $totalOrders) * 100) }}%
                            </span>
                            @endif
                        </div>
                        <div class="stat-label">Orders Processing</div>
                    </div>
                    <div class="stat-icon">
                        <i class="mdi mdi-refresh"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
