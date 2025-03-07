﻿using AutoMapper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using tableLié.Data.Dtos;
using tableLié.Data.Models;

namespace tableLié.Data.Profiles
{
    public class VillesProfile : Profile
    {
        public VillesProfile()
        {
            CreateMap<Ville, VillesDTOout>();
            CreateMap<Ville, VillesDTO>();
            CreateMap<VillesDTO, Ville>();
            CreateMap<VillesDTOin, Ville>();
        }
    }
}
