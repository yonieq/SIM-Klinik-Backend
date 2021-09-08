const Menu = [
    {header: 'Admin'},
    {
      title: 'Dashboard',
      group: 'dashboard',
      icon: 'dashboard',
      name: 'Dashboard',
      href: '/admin/dashboard'
    },
    {header: 'Kelola Data'},
    {
      title: 'Data Ruangan',
      group: 'ruangan',
      name: 'Data Ruangan',
      icon: 'room_preferences',
      href: '/admin/ruangan'
    },
    {
      title: 'Data Karyawan',
      group: 'karyawan',
      name: 'Data Karyawan',
      icon: 'person_pin',
      href: '/admin/karyawan'
    },
    {
      title: 'Data Dokter',
      group: 'dokter',
      name: 'Data Dokter',
      icon: 'person_pin',
      href: '/admin/dokter'
    },
    {header: 'Report Data'},
    {
      title: 'Medis',
      group: 'medis',
      name: 'Medis',
      icon: 'fa fa-heartbeat',
      items: [
            {name: 'Report Rekam Medis', title: 'Report Rekam Medis', href: '/admin/rekam_medis'},
            {name: 'Data Pasien', title: 'Data Pasien', href: '/admin/data_pasien'},
          ]
    },
    {
      title: 'Absensi',
      group: 'absen',
      name: 'Absensi',
      icon: 'event_note',
      href: '/admin/absensi'
    },
    {
      title: 'Apotek',
      group: 'apotek',
      name: 'Apotek',
      icon: 'medical_services',
      items: [
        {name: 'Stok Obat', title: 'Stok Obat', href: '/admin/inventori'},
        {name: 'Report Pelayanan', title: 'Report Pelayanan', href: '/admin/pelayanan_apotek'},
      ]
    },
    {
      title: 'Pendapatan',
      group: 'pendapatan',
      name: 'Pendapatan',
      icon: 'request_quote',
      href: '/admin/pendapatan'
    },
    // {
    //   title: 'Data Pasien',
    //   group: 'data',
    //   name: '',
    //   icon: 'people_alt',
    //   href: '/apotek/dashboard'
    // },
    // {
    //   title: 'Data Obat',
    //   group: 'data',
    //   name: '',
    //   icon: 'medical_services',
    //   href: '/apotek/dashboard'
    // },
    // {
    //   title: 'Data Petugas',
    //   group: 'data',
    //   name: '',
    //   icon: 'person_pin',
    //   href: '/apotek/dashboard'
    // },
    // {
    //   title: 'Widgets',
    //   group: 'widgets',
    //   component: 'widgets',
    //   icon: 'widgets',
    //   items: [
    //     {name: 'social', title: 'Social', href: '/widgets/social'},
    //     {name: 'statistic', title: 'Statistic', badge: 'new', href: '/widgets/statistic'},
    //     {name: 'chart', title: 'Chart', href: '/widgets/chart'},
    //     {name: 'list', title: 'List', href: '/widgets/list'},
    //   ]
    // },
    // {header: 'UI Elements'},
    // {
    //   title: 'General',
    //   group: 'components',
    //   component: 'components',
    //   icon: 'tune',
    //   items: [
    //     {name: 'alerts', title: 'Alerts', href: '/general/alerts'},
    //     {name: 'avatars', title: 'Avatars', href: '/general/avatars'},
    //     {name: 'badges', title: 'Badges', href: '/general/badges'},
    //     {name: 'buttons', title: 'Buttons', href: '/general/buttons'},
    //     {name: 'cards', title: 'Cards', href: '/general/cards'},
    //     {name: 'carousels', title: 'Carousels', href: '/general/carousels'},
    //     {name: 'chips', title: 'Chips', href: '/general/chips'},
    //     {name: 'dialogs', title: 'Dialogs', href: '/general/dialogs'},
    //     {name: 'icons', title: 'Icons', href: '/general/icons'},
    //     {name: 'tables', title: 'Data Tables', href: '/general/tables'},
    //     {name: 'parallax', title: 'Parallax  image', href: '/general/parallax'},
    //     {name: 'snackbar', title: 'Snackbar', href: '/general/snackbar'},
    //     {name: 'progress', title: 'Progress', href: '/general/progress'},
    //     {name: 'slider', title: 'Slider', href: '/general/sliders'},
    //     {name: 'tooltip', title: 'Tooltip', href: '/general/tooltips'},
    //     {name: 'pagination', title: 'Pagination', href: '/general/pagination'},
    //     {name: 'typography', title: 'Typography', href: '/general/typography'},
    //     {name: 'color', title: 'Color', href: '/general/colors'},
  
    //   ]
    // },
    // {
    //   title: 'Pickers',
    //   group: 'pickers',
    //   component: 'picker',
    //   icon: 'filter_vintage',
    //   items: [
    //     {name: 'timepicker', title: 'Timepicker', href: '/pickers/timepicker'},
    //     {name: 'datepicker', title: 'Datepicker', href: '/pickers/datepicker'},
  
    //   ]
    // },
    // {
    //   title: 'Layout',
    //   group: 'layout',
    //   component: 'layout',
    //   icon: 'view_compact',
    //   items: [
    //     {name: 'bottom-sheets', title: 'Bottom panels', component: 'components/bottom-sheets'},
    //     {name: 'expansion-panels', title: 'Expansion panels', component: 'components/expansion-panels'},
    //     {name: 'footer', title: 'Footer', component: 'components/footer'},
    //     {name: 'lists', title: 'Lists', component: 'components/lists'},
    //     {name: 'jumbotrons', title: 'Jumbotrons', badge: 'new', component: 'components/jumbotrons'},
    //     {name: 'menus', title: 'Menus', component: 'components/menus'},
    //     {name: 'tabs', title: 'Tabs', component: 'components/tabs'},
    //     {name: 'toolbar', title: 'Toolbars', component: 'components/toolbar'},
    //     {name: 'timeline', title: 'Timeline', component: 'components/timeline'},
    //   ]
    // },
    // {
    //   title: 'Forms & Controls',
    //   group: 'forms',
    //   component: 'forms',
    //   icon: 'edit',
    //   items: [
    //     {name: 'basic', title: 'General', href: '/forms/basic-forms'},
    //     {name: 'selects', title: 'Selects', badge: 'new', href: '/forms/selects'},
    //     {name: 'selection-controls', title: 'Selection Controls', href: '/forms/selection-controls'},
    //     {name: 'text-fields', title: 'Text Fields', href: '/forms/text-fields'},
    //     {name: 'steppers', title: 'Steppers', href: '/forms/steppers'},
    //     {name: 'editors', title: 'Editors', href: '/forms/editors'},
    //   ]
    // },
    // {divider: true},
    // {header: 'Extras'},
    // {
    //   title: 'Login',
    //   group: 'extra',
    //   icon: 'list',
    //   href: '/login'
    // },
    // {
    //   title: 'Empty',
    //   group: 'extra',
    //   icon: 'insert_drive_file',
    //   href: '/empty'
    // },
  ];
  // reorder menu
  Menu.forEach((item) => {
    if (item.items) {
      item.items.sort((x, y) => {
        let textA = x.title.toUpperCase();
        let textB = y.title.toUpperCase();
        return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
      });
    }
  });
  
  export default Menu;
  