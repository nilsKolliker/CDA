using AutoMapper;
using ECF.Data;
using ECF.Data.Dtos;
using ECF.Data.Models;
using ECF.Data.Profiles;
using ECF.Data.Services;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ECF.Controllers
{
    class GroupesController : ControllerBase
    {

        private readonly GroupesServices _service;
        private readonly IMapper _mapper;

        public GroupesController(EcfContext _context)
        {
            _service = new GroupesServices(_context);
            var config = new MapperConfiguration(cfg =>
            {
                cfg.AddProfile<GroupesProfiles>();
            });
            _mapper = config.CreateMapper();
        }

        public IEnumerable<GroupesDTOOut> GetAllGroupes()
        {
            IEnumerable<Groupe> listeGroupes = _service.GetAllGroupes();
            return _mapper.Map<IEnumerable<GroupesDTOOut>>(listeGroupes);
        }

        public ActionResult<GroupesDTOOut> GetGroupeById(int id)
        {
            Groupe commandItem = _service.GetGroupeById(id);
            if (commandItem != null)
            {
                return Ok(_mapper.Map<GroupesDTOOut>(commandItem));
            }
            return NotFound();
        }

        public void CreateGroupe(GroupesDTOIn objIn)
        {
            Groupe obj = _mapper.Map<Groupe>(objIn);
            _service.AddGroupe(obj);
        }

        public ActionResult UpdateGroupe(int id, GroupesDTOIn obj)
        {
            Groupe objFromRepo = _service.GetGroupeById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            _mapper.Map(obj, objFromRepo);
            _service.UpdateGroupe(objFromRepo);
            return NoContent();
        }

        public ActionResult DeleteGroupe(int id)
        {
            Groupe obj = _service.GetGroupeById(id);
            if (obj == null)
            {
                return NotFound();
            }
            _service.DeleteGroupe(obj);
            return NoContent();
        }


    }
}
