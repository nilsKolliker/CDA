using AutoMapper;
using PersonneAnimal.Data.Dtos;
using PersonneAnimal.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Data.Profiles
{
    public class AdoptionsProfile : Profile
    {
        public AdoptionsProfile()
        {
            CreateMap<Adoption, AdoptionDTOavecPersonne>();
            CreateMap<Adoption, AdoptionDTOavecAnimal>();
            CreateMap<AdoptionDTOin, Adoption>();
            CreateMap<Adoption, AdoptionDTOout>();
        }
    }
}
