import React from "react";
import { Link } from "@inertiajs/react";
const Home = ({ properties, categories }) => {
  return (
    <div className="min-h-screen bg-gray-100">
      {/* Header */}
      <header className="bg-blue-400 text-white py-6">
        <div className="max-w-6xl mx-auto px-4 flex justify-between items-center">
          <h1 className="text-3xl font-bold">🛒 BureauShop</h1>
          <nav>
            <Link href="/properties" className="text-lg mx-4 hover:underline">
              Explorer
            </Link>
            <Link href="/dashboard" className="text-lg mx-4 hover:underline">
              Mon Compte
            </Link>
          </nav>
        </div>
      </header>

      {/* Hero Section */}
      <section className="bg-blue-300 text-white text-center py-20">
        <h2 className="text-4xl font-bold">Trouvez le meilleur matériel de bureau !</h2>
        <p className="mt-4 text-lg">Achetez ou louez facilement vos fournitures de bureau.</p>
        <Link href="/properties" className="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold">
          Explorer les offres
        </Link>
      </section>

      {/* Liste des catégories */}
      <section className="max-w-6xl mx-auto py-10">
        <h3 className="text-2xl font-bold text-gray-800 text-center">Catégories populaires</h3>
        <div className="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
          {categories.map((category) => (
            <div key={category.id} className="p-4 bg-white rounded shadow-md text-center">
              <h4 className="text-lg font-semibold">{category.name}</h4>
            </div>
          ))}
        </div>
      </section>

      {/* Liste des propriétés en vedette */}
      <section className="max-w-6xl mx-auto py-10">
        <h3 className="text-2xl font-bold text-gray-800 text-center">Dernières annonces</h3>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
          {properties.map((property) => (
            <div key={property.id} className="bg-white rounded shadow-md overflow-hidden">
              {property.images.length > 0 && (
                <img
                  src={`/storage/${property.images[0].image_path}`}
                  alt={property.name}
                  className="w-full h-48 object-cover"
                />
              )}
              <div className="p-4">
                <h4 className="text-xl font-bold">{property.name}</h4>
                <p className="text-gray-600">{property.description.substring(0, 50)}...</p>
                <p className="text-blue-600 font-semibold mt-2">{property.price} €</p>
                <Link href={`/properties/${property.id}`} className="mt-4 inline-block text-blue-500 underline">
                  Voir plus
                </Link>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-900 text-white text-center py-6 mt-10">
        <p>© {new Date().getFullYear()} BureauShop - Tous droits réservés</p>
      </footer>
    </div>
  );
};

export default Home;
