using AutoMapper;
using modelToBase.Data.Dtos;
using modelToBase.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace modelToBase.Data.Profiles
{
    public class VillesProfile : Profile
    {
        public VillesProfile()
        {
            CreateMap<Ville, VillesDTO>();
            CreateMap<VillesDTO, Ville>();
        }
    }
}
