import './bootstrap'
import { createApp } from 'vue'
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

import HairCare from './components/HairCare.vue'
import InteriorDesign from './components/InteriorDesign.vue'
import FeaturesSection from './components/FeaturesSection.vue'
import ProServices from './components/ProServices.vue'
import CategoryList from './components/CategoryList.vue'
import ServiceList from './components/ServiceList.vue'
import SaleList from './components/SaleList.vue'
import ProductsList from './components/ProductsList.vue'
import WishList from './components/WishList.vue'
import SearchField from './components/SearchField.vue'
import AddCart from './components/AddCart.vue'
import NewsLetter from './components/NewsLetter.vue'
import SubCat from './components/SubCat.vue'

const app = createApp()

app.component('haircare', HairCare)
app.component('interiordesign', InteriorDesign)
app.component('features', FeaturesSection)
app.component('proservices', ProServices)
app.component('categorylist', CategoryList)
app.component('servicelist', ServiceList)
app.component('salelist', SaleList)
app.component('productslist', ProductsList)
app.component('wishlist', WishList)
app.component('searchfield', SearchField)
app.component('addcart', AddCart)
app.component('newsletter', NewsLetter)
app.component('subcat', SubCat)

app.mount('#app')