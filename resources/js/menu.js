$(document).ready(function(){
    const list = [
        {
            title: 'خدمات الشعر',
            items: [
                'تساريح الشعر',
                'صبغات الشعر',
                'العناية بالشعر'
            ]
        },
        {
            title: 'المعالجات',
            items: [
                'المعالجات الحارة',
                'المعالجات الباردة'
            ]
        },
        {
            title: 'المكياج',
            items: [
                'مكياج أساسي',
                'مكياج مؤقت'
            ]
        },
        {
            title: 'قسم العناية',
            items: [
                'عناية بالأيدي والأرجل',
                'حمام مغربي',
                'تنظيف البشرة',
                'إزالة الشعر'
            ]
        },
        {
            title: 'بكجات العروس',
            items: [
                'الملكة',
                'عروس VIP'
            ]
        }
    ]

    $('.itemdev').click(function(){
        $('#submenu').toggleClass('hidden')

        const find = list.find(item => item.title == $(this).text().trim())
        $('#menutitle').text($(this).text().trim())
        $('#menuul').html(`
            <li class="block py-[18px] px-4 border-b"><a class="block" href="/services/${$(this).text().trim()}">عرض الكل</a></li>
        `)
        find.items.forEach((item) => {
            $('#menuul').append(`
                <li class="block py-[18px] px-4 border-b"><a href="/services/${item}">${item}</a></li>
            `)
        })
    })

    $('#subback').click(function(){
        $('#submenu').toggleClass('hidden')
    })

    $('#close').click(function(){
        $('#mainmenu').toggleClass('sm:hidden')
    })

    $('#open').click(function(){
        $('#mainmenu').toggleClass('sm:hidden')
    })

    $('#mainmenu').click(function(e){
        if(e.target == this){
            $(this).toggleClass('sm:hidden')
        }
    })
})