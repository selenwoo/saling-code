<nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">Navigation</li>

                    <li class="nav-item">
                        <a href="{{ url('admin') }}" class="nav-link active">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i> 网站管理 <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ url('admin/company/1/edit') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 公司介绍
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/projects') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 应用案例
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/support') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 技术支持
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/company/1/edit') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 联系我们
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/contact') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 留言管理
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/newsletter') }}" class="nav-link">
                                    <i class="icon icon-target"></i> Newsletter管理
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-energy"></i> 产品管理 <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ url('admin/category/create') }}" class="nav-link">
                                    <i class="icon icon-energy"></i> 添加分类
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/category') }}" class="nav-link">
                                    <i class="icon icon-energy"></i> 产品分类
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/products') }}" class="nav-link">
                                    <i class="icon icon-energy"></i> 产品列表
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/products/create') }}" class="nav-link">
                                    <i class="icon icon-energy"></i> 添加产品
                                </a>
                            </li>

                            
                        </ul>
                    </li>                
                    
                        </ul>
                    
            </nav>