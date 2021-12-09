using AutoMapper;
using PersonneAnimal.Data.Dtos;
using PersonneAnimal.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Data.Profiles
{
    public class AnimauxProfile : Profile
    {
        public AnimauxProfile()
        {
            CreateMap<AnimalDTOin, Animal>();
            CreateMap<Animal, AnimalDTOin>();
            CreateMap<Animal, AnimalDTOout>();
        }
    }
}
