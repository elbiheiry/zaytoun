<!-- Side Menu
        ==========================================-->
<aside class="side-menu">
    <button class="toggle-btn">
        <i class="fa fa-times"></i>
    </button>
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <img src="{{ aurl('images/logo.png') }}" />
    </a>
    <ul>
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                - Dashboard
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
            <a href="{{ route('admin.settings.index') }}">
                - Site settings
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.content.index') ? 'active' : '' }}">
            <a href="{{ route('admin.content.index') }}">
                - Pages content
            </a>
        </li>
        <li
            class="sub-menu {{ request()->routeIs('admin.about.heritages.index') || request()->routeIs('admin.about.heritages.edit') || request()->routeIs('admin.about.values.index') || request()->routeIs('admin.about.index') ? 'active' : '' }}">
            <a rel="noreferrer" href="javascript:void(0);">
                - About us
                <i class="fa fa-angle-down"></i>
            </a>
            <ul>
                <li class="{{ request()->routeIs('admin.about.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.about.index') }}">
                        Content
                    </a>
                </li>
                <li
                    class="{{ request()->routeIs('admin.about.heritages.index') || request()->routeIs('admin.about.heritages.edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.about.heritages.index') }}">
                        Heritage
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.about.values.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.about.values.index') }}">
                        Core values
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="sub-menu {{ request()->routeIs('admin.projects.slider.index') || request()->routeIs('admin.projects.index') || request()->routeIs('admin.projects.edit') || request()->routeIs('admin.projects.create') || request()->routeIs('admin.categories.index') ? 'active' : '' }}">
            <a rel="noreferrer" href="javascript:void(0);">
                - Projects
                <i class="fa fa-angle-down"></i>
            </a>
            <ul>
                <li class="{{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">
                        Categories
                    </a>
                </li>

                <li
                    class="{{ request()->routeIs('admin.projects.slider.index') || request()->routeIs('admin.projects.index') || request()->routeIs('admin.projects.edit') || request()->routeIs('admin.projects.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.projects.index') }}">
                        Projects
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ request()->routeIs('admin.partners.index') ? 'active' : '' }}">
            <a href="{{ route('admin.partners.index') }}">
                - Partners
            </a>
        </li>
        <li
            class="{{ request()->routeIs('admin.articles.index') || request()->routeIs('admin.articles.create') || request()->routeIs('admin.articles.edit') ? 'active' : '' }}">
            <a href="{{ route('admin.articles.index') }}">
                - Articles
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.candidates.index') ? 'active' : '' }}">
            <a href="{{ route('admin.candidates.index') }}">
                - Candidates
            </a>
        </li>
        <li
            class="{{ request()->routeIs('admin.messages.index') || request()->routeIs('admin.messages.show') ? 'active' : '' }}">
            <a href="{{ route('admin.messages.index') }}">
                - Messages
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.subscribers.index') ? 'active' : '' }}">
            <a href="{{ route('admin.subscribers.index') }}">
                - Subscribers
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.links.index') ? 'active' : '' }}">
            <a href="{{ route('admin.links.index') }}">
                - Social links
            </a>
        </li>
    </ul>
    <!--End Ul-->
</aside>
<!--End Aside-->
