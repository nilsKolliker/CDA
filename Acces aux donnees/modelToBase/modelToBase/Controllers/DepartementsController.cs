﻿using AutoMapper;
using Microsoft.AspNetCore.JsonPatch;
using Microsoft.AspNetCore.Mvc;
using modelToBase.Data.Dtos;
using modelToBase.Data.Models;
using modelToBase.Data.Services;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace modelToBase.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class DepartementsController: ControllerBase
    {

        private readonly DepartementsServices _service;
        private readonly IMapper _mapper;

        public DepartementsController(DepartementsServices service, IMapper mapper)
        {
            _service = service;
            _mapper = mapper;
        }

        //GET api/Departements
        [HttpGet]
        public ActionResult<IEnumerable<DepartementsDTO>> GetAllDepartements()
        {
            IEnumerable<Departement> listeDepartements = _service.GetAllDepartements();
            return Ok(_mapper.Map<IEnumerable<DepartementsDTO>>(listeDepartements));
        }

        //GET api/Departements/{i}
        [HttpGet("{id}", Name = "GetDepartementById")]
        public ActionResult<DepartementsDTO> GetDepartementById(int id)
        {
            Departement commandItem = _service.GetDepartementById(id);
            if (commandItem != null)
            {
                return Ok(_mapper.Map<DepartementsDTO>(commandItem));
            }
            return NotFound();
        }

        //POST api/Departements
        [HttpPost]
        public ActionResult<DepartementsDTO> CreateDepartement(Departement obj)
        {
            _service.AddDepartement(obj);
            return CreatedAtRoute(nameof(GetDepartementById), new { Id = obj.IdDepartement }, obj);
        }

        //POST api/Departements/{id}
        [HttpPut("{id}")]
        public ActionResult UpdateDepartement(int id, DepartementsDTO obj)
        {
            Departement objFromRepo = _service.GetDepartementById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            _mapper.Map(obj, objFromRepo);
            _service.UpdateDepartement(objFromRepo);
            return NoContent();
        }

        // Exemple d'appel
        // [{
        // "op":"replace",
        // "path":"",
        // "value":""
        // }]
        //PATCH api/Departements/{id}
        [HttpPatch("{id}")]
        public ActionResult PartialDepartementUpdate(int id, JsonPatchDocument<Departement> patchDoc)
        {
            Departement objFromRepo = _service.GetDepartementById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            Departement objToPatch = _mapper.Map<Departement>(objFromRepo);
            patchDoc.ApplyTo(objToPatch, ModelState);
            if (!TryValidateModel(objToPatch))
            {
                return ValidationProblem(ModelState);
            }
            _mapper.Map(objToPatch, objFromRepo);
            _service.UpdateDepartement(objFromRepo);
            return NoContent();
        }

        //DELETE api/Departements/{id}
        [HttpDelete("{id}")]
        public ActionResult DeleteDepartement(int id)
        {
            Departement obj = _service.GetDepartementById(id);
            if (obj == null)
            {
                return NotFound();
            }
            _service.DeleteDepartement(obj);
            return NoContent();
        }


    }
}
