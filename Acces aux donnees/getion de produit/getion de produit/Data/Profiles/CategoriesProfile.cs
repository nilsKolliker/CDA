using AutoMapper;
using Gestion_de_Produits.Data.Dtos;
using getion_de_produit.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Gestion_de_Produits.Data.Profiles
{
    class CategoriesProfile : Profile
    {
        public CategoriesProfile()
        {
            CreateMap<CategorieDTOin, Categorie>();
            CreateMap<Categorie, CategorieDTOout>();
        }
    }
}
