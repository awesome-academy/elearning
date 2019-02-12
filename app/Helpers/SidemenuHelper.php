<?php
if (!function_exists('createMenu')) {
    function createMenu()
    {
        $menu = config('controlpanel.sidemenu');
        $tree = '';
        foreach ($menu as $item) {
            $tree .= renderItem($item);
        }

        return $tree;
    }
}
if (!function_exists('to_slug')) {
    function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);

        return $str;
    }
}
if (!function_exists('renderItem')) {
    function renderItem($item, $return = '')
    {
        if ($item['type'] == 'item') {
            $return .= '<li class="m-menu__item" aria-haspopup="true">
				<a href="' . $item['link'] . '" class="m-menu__link ">
					<i class="' . $item['icon'] . '">
						<span></span>
					</i>
					<span class="m-menu__link-text">' . $item['name'] . '</span>
				</a>
			</li>';
        } elseif ($item['type'] == 'submenu') {
            $return .=
            '<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
				<a href="' . $item['link'] . '" class="m-menu__link m-menu__toggle">
					<i class="' . $item['icon'] . '"></i>
					<span class="m-menu__link-text">' . $item['name'] . '</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
							<span class="m-menu__link">
								<span class="m-menu__link-text">' . $item['name'] . '</span>
							</span>
						</li>';
            if (!empty($item['children'])) {
                foreach ($item['children'] as $child) {
                    $return .= renderItem($child);
                }
            }
            $return .= '</ul>
				</div>
			</li>';
        } else {
            $return .= '<li class="m-menu__section ">
				<h4 class="m-menu__section-text">' . $item['name'] . '</h4>
				<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>';
        }

        return $return;
    }
}
if (!function_exists('renderSubHead')) {
    function renderSubHead($item)
    {
        $return = '';
        $return .= '<div class="m-subheader ">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                <li class="m-nav__item m-nav__item--home">
                                    <a href="#" class="m-nav__link m-nav__link--icon">
                                        <i class="m-nav__link-icon la la-home"></i>
                                    </a>
                                </li>';
        foreach ($item as $value) {
            $return .= '<li class="m-nav__separator">-</li>
            <li class="m-nav__item">
                <a href="#" class="m-nav__link">
                    <span class="m-nav__link-text">' . $value . '</span>
                </a>
            </li>';
        }
        $return .= '</ul>
                </div>
            </div>
        </div>';

        return $return;
    }
}
if (!function_exists('renderTableHead')) {
    function renderTableHead($name, $link)
    {
        $return = '';
        $return .= '<div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="' . $link . '" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>' . $name . '</span>
                            </span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>';

        return $return;
    }
}
